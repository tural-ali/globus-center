<?php
use kato\DropZone;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */

$this->title = 'Gallery Contents';
$this->params['breadcrumbs'][] = ['label' => 'Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Settings';
?>
<div class="gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    Each uploaded files must be LESS than 1MB
    <?= DropZone::widget([
        'options' => [
            'url' => '/gallery/upload/' . $model->id,
            'paramName' => "image",
        ],
        'clientEvents' => [
            'queuecomplete' => "function(file){
                    $.pjax.reload({container:'#gallery-media'});
                }"
        ]
    ]);


    if ($model->imgUrl) {
        echo "<h2>Main Photo</h2>
            <img class='thumbnail' style='height: 100px' src='http://globuscenter.az/images/gallery/$model->imgUrl'/>";
    }
    ?>
    <?= $this->render('_uform', [
        'model' => $model,
    ]) ?>


    <div class="gallery-media-index">
        <? Pjax::begin(['id' => 'gallery-media']);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                [
                    'attribute' => 'type',
                    'filter' => false,
                    'value' => function ($data) {
                        if ($data->type == 1) {
                            $style = ($data->default == 1) ? "style='color: #259b24'" : "";
                            return "<span $style class='glyphicon glyphicon-picture'></span>";
                        } else if ($data->type == 2)
                            return "<span class='glyphicon glyphicon-play'></span>";
                    },
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'width: 50px;']
                ],
                [
                    'format' => 'html',
                    'label' => 'Photo',
                    'value' => function ($data) {
                        if ($data->type == 1)
                            return Html::img("http://globuscenter.az/images/gallery/" . $data->url, ['width' => '100']);
                        else if ($data->type == 2)
                            return Html::img("http://img.youtube.com/vi/$data->url/0.jpg", ['width' => '100']);
                    },
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            if ($model->type == 1)
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                                    ['delete-photo', 'id' => $model->id],
                                    [
                                        'data' => ['method' => 'post']
                                    ]
                                );
                        },
                        'set-default' => function ($url, $model, $key) {
                            if ($model->type == 1)
                                return Html::a(
                                    '<span class="glyphicon glyphicon-asterisk"></span>',
                                    ['set-default', 'id' => $model->id],
                                    [
                                        'data' => ['method' => 'post']
                                    ]
                                );
                        },
                    ],
                    'contentOptions' => ['style' => 'width: 100px;']
                ]
            ]

        ]);
        Pjax::end();
        ?>

    </div>

</div>
