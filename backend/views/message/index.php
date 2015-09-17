<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translation';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'messageText',
                'value' => 'id0.message'
            ],            [
                'attribute' => 'messageCategory',
                'value' => 'id0.category'
            ],
            'language',
            'translation:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{update}'],
        ],
    ]); ?>

</div>
