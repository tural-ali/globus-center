<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div
        class="form-group"> <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>