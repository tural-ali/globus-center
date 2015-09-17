<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\NavigationTranslation;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavigationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Navigations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navigation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Navigation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            "defaultTitle",
            [
                'attribute' => 'languages',
                'format' => 'html',
                'value' => function ($model, $key, $index, $column) {
                    $markup = "";
                    foreach (Yii::$app->params["languages"] as $key => $lang) {
                        $result = NavigationTranslation::find()->where(["language" => $key, "navigationID" => $model->id])->one();
                        if ($result)
                            $markup .= HTML::a(strtoupper($lang), ["navigation/update-translation", "id" => $result->id], ['class' => 'label label-success']);
                        else
                            $markup .= HTML::a(strtoupper($lang), ["navigation/create", "navigationID" => $model->id, "lang" => $key], ['class' => 'label label-danger']);
                    }
                    return $markup;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width: 100px;']
            ]
        ]

    ]); ?>

</div>
