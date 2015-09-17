<?php

namespace backend\controllers;

use Yii;
use common\models\Navigation;
use backend\models\NavigationSearch;
use common\models\NavigationTranslation;
use backend\models\NavigationTranslationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * NavigationController implements the CRUD actions for Navigation model.
 */
class NavigationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-translation'=>['post'],

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
                            'update-translation',
                            'delete-translation'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Navigation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NavigationSearch();
        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);
        $data = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
        return $this->render('index', $data);
    }



    public function actionCreate()
    {
        $model = new Navigation();
        $tlateModel = new NavigationTranslation();

        $isNewRecord = true;

        $availableLangs = Yii::$app->params["languages"];

        if (isset($_GET["navigationID"])) {
            $model = Navigation::findOne($_GET["navigationID"]);
            $isNewRecord = false;

            $existingLangs = NavigationTranslation::find()
                ->where(["NavigationID" => intval($_GET["navigationID"])])
                ->select(["language"])
                ->asArray()
                ->all();

            foreach ($existingLangs as $key => $value)
                unset($availableLangs[$value["language"]]);
        }


        if (isset($_GET["lang"]) && array_key_exists($_GET["lang"], Yii::$app->params["languages"]))
            $model->language = $_GET["lang"];

        if ($model->load(Yii::$app->request->post())) {

            if ($model->language == Yii::$app->language)
                $model->defaultTitle = $model->title;

            $model->save();
            $tlateModel->navigationID = ($isNewRecord) ? $model->id : intval($_GET["navigationID"]);

            $tlateModel->title = $model->title;
            $tlateModel->language = $model->language;
            $tlateModel->url = $model->url;

            if ($tlateModel->validate() && $tlateModel->save()) {
                $model->save();
                return $this->redirect(['index']);
            }
            else {
                print_r($tlateModel->errors);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'availableLangs' => ($availableLangs) ? $availableLangs : null
            ]);
        }
    }

    /**
     * Updates an existing Navigation model.
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

    public function actionUpdateTranslation($id)
    {
        $model = NavigationTranslation::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('updateTranslation', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteTranslation($id)
    {
        $tr = NavigationTranslation::findOne($id);
        $tr->delete();
        return $this->redirect(['index']);
    }


    /**
     * Deletes an existing Navigation model.
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
     * Finds the Navigation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Navigation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Navigation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
