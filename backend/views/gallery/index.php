<?php
use Yii;
use common\models\GalleryTranslation;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'defaultTitle',
                'value' => function ($model, $key, $index, $column) {
                    return ($model->defaultTitle) ? $model->defaultTitle : "Please create " . Yii::$app->language . " translation";
                }
            ],
            [
                'attribute' => 'languages',
                'format' => 'html',
                'contentOptions' => ['style' => 'width: 150px;'],
                'value' => function ($model, $key, $index, $column) {
                    $markup = "";
                    foreach (Yii::$app->params["languages"] as $key => $lang) {
                        $result = GalleryTranslation::find()->where(["language" => $key, "galleryID" => $model->id])->one();
                        if ($result)
                            $markup .= HTML::a($lang, ["update-translation", "id" => $result->id], ['class' => 'label label-success']);
                        else
                            $markup .= HTML::a($lang, ["create", "galleryID" => $model->id, "lang" => $key], ['class' => 'label label-danger']);
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
