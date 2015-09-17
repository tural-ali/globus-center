<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use backend\models\PostSearch;
use common\models\PostTranslation;
use backend\models\PostTranslationSearch;
use common\models\Video;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * PostController implements the CRUD actions for PostTranslation model.
 */
class PostController extends Controller
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
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all PostTranslation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
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
            $post = Post::findOne($id);
            $fileUrl = $id . "_" . uniqid() . '.' . $ext;
            $filePath = Yii::getAlias('@frontend') . '/web/images/content/' . $fileUrl;
            $post->imgUrl = $fileUrl;
            if ($file->saveAs($filePath)) {
                $post->save();
                echo Json::encode($file);
            }
        }
    }

    public function actionUpdateTranslation($id)
    {
        $model = PostTranslation::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->language == Yii::$app->language) {
                $model->post->defaultTitle = $model->title;
                $model->post->save();
            }
            return $this->redirect(['post/index']);
        } else {
            return $this->render('updateTranslation', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteTranslation($id)
    {
        $tr = PostTranslation::findOne($id);
        $tr->delete();
        return $this->redirect(['index']);
    }


    /**
     * Creates a new PostTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $tlateModel = new PostTranslation();

        $isNewRecord = true;

        $availableLangs = Yii::$app->params["languages"];


        if (isset($_GET["postID"])) {
            $model = Post::findOne($_GET["postID"]);
            $isNewRecord = false;

            $existingLangs = PostTranslation::find()
                ->where(["postID" => intval($_GET["postID"])])
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
            $tlateModel->postID = ($isNewRecord) ? $model->id : intval($_GET["postID"]);

            $tlateModel->title = $model->title;
            $tlateModel->language = $model->language;
            $tlateModel->preview = $model->preview;
            $tlateModel->body = $model->body;
            if ($tlateModel->validate() && $tlateModel->save()) {
                if ($isNewRecord)
                    return $this->redirect(['update',
                        'id' => (isset($_GET["postID"])) ?
                            intval($_GET["postID"]) : $model->id]);
                else {
                    $model->save();
                    return $this->redirect(['index']);
                }
            } else {
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
     * Updates an existing PostTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $postID
     * @param string $language
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $availableLangs = Yii::$app->params["languages"];

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'availableLangs' => $availableLangs
            ]);
        }
    }

    /**
     * Deletes an existing PostTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $postID
     * @param string $language
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $postID
     * @param string $language
     * @return PostTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
