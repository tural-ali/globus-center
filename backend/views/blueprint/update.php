<?php
use nex\chosen\Chosen;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Profession;
use kato\DropZone;

/* @var $this yii\web\View */
/* @var $model common\models\Profession */

$this->title = 'Blueprint Update';
$this->params['breadcrumbs'][] = ['label' => 'Blueprint', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profession-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Upload main photo for profession</h4>

    <?= DropZone::widget([
        'options' => [
            'url' => '/blueprint/upload/' . $model->id,
            'paramName' => "image",
        ],
        'clientEvents' => [
            'queuecomplete' => "function(file){
                    $.pjax.reload({container:'#main-photo'});
                }"
        ]
    ]);

    Pjax::begin(['id' => 'main-photo']);
    if ($model->imgUrl) {
        echo "<h2>Main Photo</h2>
        <img class='thumbnail' style='height: 100px' src='http://globuscenter.az/images/blueprints/$model->imgUrl'/>";
    }
    Pjax::end();
    ?>
    <?= Html::a('Update', ['blueprint/index'], ['class' => 'btn btn-success']) ?>


</div>
