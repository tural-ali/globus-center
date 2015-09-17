<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Blueprint */

$this->title = 'Blueprint Translation';
$this->params['breadcrumbs'][] = ['label' => 'Blueprints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blueprint-create">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['delete-translation', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post'
            ],
        ]) ?>
    </h1>

    <div class="profession-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="glyphicon glyphicon-ok"></i>', ['class' => 'btn btn-success']) ?>

        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
