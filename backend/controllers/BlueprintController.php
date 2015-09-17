<?php

namespace backend\controllers;

use Yii;
use common\models\Blueprint;
use common\models\BlueprintTranslation;
use backend\models\BlueprintSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * BlueprintController implements the CRUD actions for Blueprint model.
 */
class BlueprintController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-translation' => ['post'],

                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'upload',
                            'update-translation',
                            'delete-translation'
                        ],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }

    public function actionDeleteTranslation($id)
    {
        $tr = BlueprintTranslation::findOne($id);
        if ($tr->delete())
            return $this->redirect(['index']);
    }


    public function actionCreate()
    {
        $model = new Blueprint();
        $availableLangs = Yii::$app->params["languages"];
        $isNewRecord = true;
        if (isset($_GET["id"])) {
            $model = $this->findModel(intval($_GET["id"]));
            $isNewRecord = false;
            foreach ($availableLangs as $key => $value)
                if ($model->hasTranslation($key))
                    unset($availableLangs[$key]);
            if (isset($_GET["lang"]) && array_key_exists($_GET["lang"], Yii::$app->params["languages"]))
                $model->language = $_GET["lang"];
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->language == substr(Yii::$app->language, 0, 2))
                $model->defaultTitle = $model->title;
            $model->translate($model->language)->blueprintID = ($isNewRecord) ? $model->id : intval($_GET["id"]);
            $model->translate($model->language)->description = $model->description;
            $model->translate($model->language)->language = $model->language;
            $model->translate($model->language)->title = $model->title;
            $model->save();
            $redirect = ['index'];
            return $this->redirect($redirect);
        } else {
            return $this->render('create', [
                'model' => $model,
                'availableLangs' => $availableLangs
            ]);
        }
    }


    public function actionUpdateTranslation($id)
    {
        $model = BlueprintTranslation::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->language == substr(Yii::$app->language, 0, 2)) {
                $model->blueprint->defaultTitle = $model->title;
                $model->blueprint->save();
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('updateTranslation', [
                'model' => $model
            ]);
        }
    }

    public function actionUpload($id)
    {
        if (isset($_FILES['image'])) {
            $file = UploadedFile::getInstanceByName('image');
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $blueprint = Blueprint::findOne($id);
            $fileUrl = $id . '.' . $ext;
            $filePath = Yii::getAlias('@frontend') . '/web/images/blueprints/' . $fileUrl;
            $blueprint->imgUrl = $fileUrl;
            if ($file->saveAs($filePath)) {
                $blueprint->save();
                echo Json::encode($file);
            }
        }
    }

    /**
     * Lists all Blueprint models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlueprintSearch();
        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);
        $data = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
        return $this->render('index', $data);
    }

    /**
     * Displays a single Blueprint model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Blueprint model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Blueprint model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blueprint model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blueprint the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blueprint::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
