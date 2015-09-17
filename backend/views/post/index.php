<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\PostTranslation;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'defaultTitle',
            [
                'attribute' => 'languages',
                'format' => 'html',
                'value' => function ($model, $key, $index, $column) {
                    $markup = "";
                    foreach (Yii::$app->params["languages"] as $key => $lang) {
                        $result = PostTranslation::find()->where(["language" => $key, "postID" => $model->id])->one();
                        if ($result)
                            $markup .= HTML::a(strtoupper($lang), ["post/update-translation", "id" => $result->id], ['class' => 'label label-success']);
                        else
                            $markup .= HTML::a(strtoupper($lang), ["post/create", "postID" => $model->id, "lang" => $key], ['class' => 'label label-danger']);
                    }
                    return $markup;
                },
                'contentOptions' => ['style' => 'width: 150px;']
            ],
            // 'publish',
            // 'createdAt',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions' => ['style' => 'width: 100px;']
            ]
        ]

    ]); ?>

</div>
