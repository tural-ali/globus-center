<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NavigationTranslation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navigation-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'navigationID')->textInput() ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post'
            ],
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
