<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavigationTranslationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Navigation Translations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-translation-index">

    <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?=         Html::a('Create Navigation Translation'        , ['create'], ['class' => 'btn btn-success']) ?>
    </p>

            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

                    'id',
            'navigationID',
            'language',
            'url:url',
            'title',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width: 100px;']
            ]
        ]

        ]); ?>
    
</div>
