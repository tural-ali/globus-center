<?php
namespace frontend\controllers;

use Yii;
use common\models\Blueprint;
use common\models\Post;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        //return $this->renderPartial('soon');
        $data["blueprints"] = Blueprint::find()->with("translations")->all();
        return $this->render('index', $data);
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionViewPage($id)
    {

        $content = Post::findOne($id);
        if ($content)
            return $this->render('view', ["content" => $content]);
        else
            throw new \yii\web\HttpException(404, Yii::t("error", 'The requested page could not be found.'));
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}
