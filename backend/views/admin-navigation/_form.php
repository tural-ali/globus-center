<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Navigation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navigation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'menuType')->textInput() ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
