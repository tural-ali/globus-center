<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\PostTranslation */

$this->title = 'Update Post Translation: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-translation-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'body')->textarea(['rows' => 6])->widget(CKEditor::className(), ['options' => ['rows' => 6], 'preset' => 'full' ])  ?>

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
