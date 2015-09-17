<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryTranslation */

$this->title = 'Update Gallery Translation: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="gallery-translation-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete-translation', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'method' => 'post'
                ],
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
