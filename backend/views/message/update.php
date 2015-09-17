<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */

$this->title = 'Update Message: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'language' => $model->language]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Origin: <?=$model->id0->message?></h4>
    <h4>Translation to: <?=$model->language?></h4>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
