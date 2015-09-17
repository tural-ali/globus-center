<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Blueprint;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlueprintSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blueprints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blueprint-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Blueprint', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'format' => 'html',
                'label' => 'Photo',
                'value' => function ($data) {
                    if ($data->imgUrl)
                        return Html::img("http://globuscenter.az/images/blueprints/" . $data->imgUrl, ['width' => '100']);
                    else
                        return "no photo";
                },
                'contentOptions' => ['style' => 'width: 130px;']
            ],
            'defaultTitle',
            [
                'attribute' => 'languages',
                'format' => 'html',
                'contentOptions' => ['style' => 'width: 150px;'],
                'value' => function ($model, $key, $index, $column) {
                    $markup = [];
                    foreach (Yii::$app->params["languages"] as $key => $lang) {
                        $result = $model->hasTranslation($key);
                        if ($result)
                            $markup[] = HTML::a($lang, ["update-translation", "id" => $model->translate($key)->id], ['class' => 'label label-success']);
                        else
                            $markup[] = HTML::a($lang, ["create", "id" => $model->id, "lang" => $key], ['class' => 'label label-danger']);
                    }
                    return implode(" ", $markup);
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width: 100px;']
            ]
        ]

    ]); ?>

</div>
