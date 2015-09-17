<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Blueprint */

$this->title = 'Create Blueprint';
$this->params['breadcrumbs'][] = ['label' => 'Blueprints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blueprint-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="blueprint-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
