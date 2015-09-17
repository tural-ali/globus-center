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
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navigation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $availableLangs = ($availableLangs) ? $availableLangs : Yii::$app->params["languages"];
    echo $form->field($model, 'language')
        ->dropDownList(
            $availableLangs,
            ['prompt' => "Choose One"]
        );
    ?>

    <?= $form->field($model, 'title')->textInput() ?>


    <h4></h4>
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

    <h4>You have 2 options: to choose previously created post or to add custom url (for example to another website)</h4>
    <?
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Related post',
                'content' => $form->field($model, 'postID')->widget(
                    Chosen::className(), [
                    'items' => ArrayHelper::map(Post::find()->all(), 'id', 'defaultTitle'),
                    'disableSearch' => 5,
                    'clientOptions' => [
                        'search_contains' => true,
                        'single_backstroke_delete' => false,
                    ],
                ]),
                'active' => true
            ],
            [
                'label' => 'Custom link',
                'content' => $form->field($model, 'url')->textInput(),
            ]
        ],
    ]);
    ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
