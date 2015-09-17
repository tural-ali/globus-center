<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use nex\chosen\Chosen;
use common\models\Post;
use common\models\Navigation;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\Navigation */

$this->title = 'Update Navigation: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Navigations', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="navigation-update">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="navigation-form">

        <?php $form = ActiveForm::begin(); ?>


        <?
        echo
        $form->field($model, 'parentID')->widget(
            Chosen::className(), [
            'items' => ArrayHelper::map(Navigation::find()->all(), 'id', 'defaultTitle'),
            'disableSearch' => 5,
            'clientOptions' => [
                'search_contains' => true,
                'single_backstroke_delete' => false,
            ],
        ])->hint('Please choose parent navigation element if it has');
        ?>

        <?= $form->field($model, 'order')->textInput() ?>

        <?=
        $form->field($model, 'postID')->widget(
            Chosen::className(), [
            'items' => ArrayHelper::map(Post::find()->all(), 'id', 'defaultTitle'),
            'disableSearch' => 5,
            'clientOptions' => [
                'search_contains' => true,
                'single_backstroke_delete' => false,
            ]
        ]); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
