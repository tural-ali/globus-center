<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use common\models\Category;
use nex\chosen\Chosen;


/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Create Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-form">

        <?php $form = ActiveForm::begin(); ?>

        <?
        $availableLangs = ($availableLangs) ? $availableLangs : Yii::$app->params["languages"];
        echo $form->field($model, 'language')
            ->dropDownList(
                $availableLangs,
                ['prompt' => "Choose One"]
            );
        ?>

        <?= $form->field($model, 'title')->textInput() ?>
        <?= $form->field($model, 'body')->textarea(['rows' => 6])->widget(CKEditor::className(), ['options' => ['rows' => 6], 'preset' => 'standart']); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
