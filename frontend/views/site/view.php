<?php
use yii\helpers\Html;
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\assets\ContentAsset;

ContentAsset::register($this);
$lang = Yii::$app->language;
$this->title = $content->translate($lang)->title;
?>
<div class="container">

    <h2>
        <?= Html::encode($this->title) ?>
    </h2>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $content->translate($lang)->body; ?>
    </div>
    <?

    //    echo "<img class='main-photo' src='/images/content/$content->imgUrl' alt='$this->title'>";
    if ($content->gallery) {
        ?>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="content-gallery">

                <?
                foreach ($content->gallery->galleryMedia as $mediaItem) {
                    if ($mediaItem->type == 1) {
                        $url = "/images/gallery/$mediaItem->url";
                        ?>
                        <div>
                            <a class="lbox" data-lightbox="<?= $content->slug ?>" href="<?= $url ?>"
                               data-title="<?= $content->title ?>">
                                <?= EasyThumbnailImage::thumbnailImg(
                                    Yii::getAlias('@frontend') . "/web$url",
                                    250,
                                    250,
                                    EasyThumbnailImage::THUMBNAIL_INSET,
                                    ['alt' => $content->title]
                                );

                                ?>
                            </a>
                        </div>
                    <?
                    } else if ($mediaItem->type == 2) {
                        $url = "http://youtube.com/watch?v=$mediaItem->url";
                        ?>
                        <div>
                            <a href="<?= $url ?>" target="_blank">
                                <div class="play-icon"></div>
                                <img src="http://img.youtube.com/vi/<?= $mediaItem->url ?>/0.jpg"/>
                            </a>
                        </div>
                    <?
                    }
                } ?>
            </div>
        </div>
    <?
    }
    ?>


</div>
