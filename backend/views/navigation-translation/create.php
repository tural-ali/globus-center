<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NavigationTranslation */

$this->title = 'Create Navigation Translation';
$this->params['breadcrumbs'][] = ['label' => 'Navigation Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
