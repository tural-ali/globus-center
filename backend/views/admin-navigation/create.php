<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Navigation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'AdminNavigation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Navigations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
