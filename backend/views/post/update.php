<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kato\DropZone;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use common\models\Gallery;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Update Post';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="gallery-form">
        <?php $form = ActiveForm::begin(); ?>

        <?=
        $form->field($model, 'galleryID')->widget(
            Chosen::className(), [
            'items' => ArrayHelper::map(Gallery::find()->all(), 'id', 'defaultTitle'),
            'disableSearch' => 5,
            'clientOptions' => [
                'search_contains' => true,
                'single_backstroke_delete' => false,
            ],
        ])->hint("Select previously created gallery to link with page");
        ?>
        <?= $form->field($model, 'publish')->checkBox(); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
