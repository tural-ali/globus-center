<?php

namespace backend\controllers;

use Yii;
use common\models\Gallery;
use backend\models\GallerySearch;
use common\models\GalleryTranslation;
use common\models\GalleryMedia;
use backend\models\GalleryMediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-photo' => ['post'],
                    'set-default' => ['post'],
                    'delete-translation' => ['post']
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
                            'set-default',
                            'delete-photo',
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
     * Lists all Gallery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);
        $data = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
        return $this->render('index', $data);
    }

    public function actionUpload($id)
    {
        if (isset($_FILES['image'])) {
            $file = UploadedFile::getInstanceByName('image');
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $galleryMedia = new GalleryMedia();
            $galleryMedia->galleryID = $id;
            $fileUrl = $id . "_" . uniqid() . '.' . $ext;
            $filePath = Yii::getAlias('@frontend') . '/web/images/gallery/' . $fileUrl;
            $galleryMedia->url = $fileUrl;
            if ($file->saveAs($filePath)) {
                $galleryMedia->type = 1;
                $galleryMedia->save();
                echo Json::encode($file);
            }
        }
    }

    public function actionDeletePhoto($id)
    {
        $image = GalleryMedia::findOne($id);
        $galID = $image->galleryID;
        $image->delete();
        return $this->redirect(['update', 'id' => $galID]);
    }



    public function actionSetDefault($id)
    {
        $image = GalleryMedia::findOne($id);
        if ($image) {
            $image->default = 1;
            $gallery = Gallery::findOne($image->galleryID);
            $gallery->imgUrl = $image->url;
            if ($gallery->save()) {
                $image->save();
                return $this->redirect(['update', 'id' => $gallery->id]);
            }
        }
    }


    public function actionUpdateTranslation($id)
    {
        $model = GalleryTranslation::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['gallery/index']);
        } else {
            return $this->render('translation', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteTranslation($id)
    {
        $tr = GalleryTranslation::findOne($id);
        $tr->delete();
        return $this->redirect(['index']);
    }



    /**
     * Creates a new Gallery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gallery();
        $tlateModel = new GalleryTranslation();

        $isNewRecord = true;

        $availableLangs = Yii::$app->params["languages"];

        if (isset($_GET["galleryID"])) {
            $model = Gallery::findOne($_GET["galleryID"]);
            $isNewRecord = false;

            $existingLangs = GalleryTranslation::find()
                ->where(["galleryID" => intval($_GET["galleryID"])])
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
            $tlateModel->galleryID = ($isNewRecord) ? $model->id : intval($_GET["galleryID"]);

            $tlateModel->title = $model->title;
            $tlateModel->language = $model->language;
            if ($tlateModel->validate() && $tlateModel->save())
                if ($isNewRecord)
                    return $this->redirect(['update', 'id' => (isset($_GET["galleryID"])) ? intval($_GET["galleryID"]) : $model->id]);
                else {
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
     * Updates an existing Gallery model.
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
            $searchModel = new GalleryMediaSearch();
            $query = Yii::$app->request->queryParams;
            $query["GalleryMediaSearch"]["galleryID"] = intval($id);
            $dataProvider = $searchModel->search($query);
            $data = [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
            ];
            return $this->render('update', $data);
        }
    }

    /**
     * Deletes an existing Gallery model.
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
     * Finds the Gallery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gallery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
