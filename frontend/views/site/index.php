<?
use himiklab\thumbnail\EasyThumbnailImage;
use frontend\assets\MainAsset;

MainAsset::register($this);
$this->title = 'Globus Center';
?>

<!--home start-->

<div id="home">


    <div class="container">
        <div class="row">
            <div class="col-md-12 cBusiness">
                <h3><?= Yii::t("main-page", "part1-title") ?></h3>
                <h4><?= Yii::t("main-page", "part1-subtitle") ?></h4>

                <p>
                    <?= Yii::t("main-page", "part1-description") ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 project">
                <h3 id="counter">0</h3>
                <h4><?= Yii::t("main-page", "part1-column1-title") ?></h4>

                <p><?= Yii::t("main-page", "part1-column1-description") ?></p>
            </div>
            <div class="col-md-4 project">
                <h3 id="counter1">0</h3>
                <h4><?= Yii::t("main-page", "part1-column1-title") ?></h4>

                <p><?= Yii::t("main-page", "part1-column2-description") ?></p>

            </div>
            <div class="col-md-4 project">
                <h3 id="counter2" style="margin-left: 20px;">0</h3>
                <h4 style="margin-left: 20px;"><?= Yii::t("main-page", "part1-column3-title") ?></h4>

                <p><?= Yii::t("main-page", "part1-column3-description") ?></p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 centPic">
                <div id="map-canvas">
                </div>
            </div>
        </div>
    </div>
</div>


<div id="about">
    <div class="line2">
        <div class="container">

            <div class="row Fresh">
                <h3><?= Yii::t("main-page", "part2-title") ?></h3>

                <div class="col-md-3">
                    <i class="fa fa-4 fa-shopping-cart"></i>
                    <h4>Globus Mall</h4>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-briefcase fa-4"></i>
                    <h4>Globus Business Club</h4>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-4 fa-plus-square-o"></i>
                    <h4><?= Yii::t("main-page", "clinic") ?></h4>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-cutlery"></i>
                    <h4><?= Yii::t("main-page", "Restaurant") ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 wwa">
                <span name="about"></span>

                <h3><?= Yii::t("main-page", "part3-title") ?></h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 hr1">
                <hr/>
            </div>
        </div>
    </div>


    <div style="position: relative;">

        <div class="container">
            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue darken-4">-</div>

                        <h3>-1-5 <?= Yii::t("common", "stages") ?></h3>

                        <p><?= Yii::t("stages", "-1-5-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">
                        <div class="stage-num blue darken-4">1</div>

                        <h3>1. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "1-description") ?></p>
                    </div>
                </div>
            </div>

            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue darken-3">2</div>
                        <h3>2. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "2-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">
                        <div class="stage-num blue darken-3">3</div>

                        <h3>3. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "3-description") ?></p>
                    </div>
                </div>
            </div>

            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue darken-2">4</div>

                        <h3>4. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "4-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">

                        <div class="stage-num blue darken-2">5</div>
                        <h3>5. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "5-description") ?></p>
                    </div>
                </div>
            </div>

            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue darken-1">6</div>

                        <h3>6. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "6-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">
                        <div class="stage-num blue darken-1">7</div>

                        <h3>7. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "7-description") ?></p>
                    </div>
                </div>
            </div>


            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue">8</div>

                        <h3>8. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "8-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">
                        <div class="stage-num blue">9</div>

                        <h3>9. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "9-description") ?></p>
                    </div>
                </div>
            </div>

            <div class="row about">
                <div class="col-md-6">
                    <div class="about1">
                        <div class="stage-num blue lighten-1">10</div>

                        <h3>10. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "10-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2">
                        <div class="stage-num little blue lighten-1">11-16</div>

                        <h3>11-16 <?= Yii::t("common", "stages") ?></h3>

                        <p><?= Yii::t("stages", "11-16-description") ?></p>
                    </div>
                </div>
            </div>

            <div class="row about">
                <div class="col-md-6">
                    <div class="about1 last">
                        <div class="stage-num blue lighten-2">17</div>
                        <h3>17. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "17-description") ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about2 last">
                        <div class="stage-num blue lighten-2">18</div>

                        <h3>18. <?= Yii::t("common", "stage") ?></h3>

                        <p><?= Yii::t("stages", "18-description") ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="project">
    <div class="line3">
        <div class="container">
            <div class="row Ama">
                <div class="col-md-12">
                    <h3><?= Yii::t("main-page", "part4-title") ?></h3>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row">


            <div class="portfolio_block columns3">
                <?
                foreach ($blueprints as $bp) {
                    $thumb = EasyThumbnailImage::thumbnailImg(
                        Yii::getAlias('@frontend') . "/web/images/blueprints/$bp->imgUrl",
                        400,
                        400,
                        EasyThumbnailImage::THUMBNAIL_OUTBOUND,
                        [
                            'alt' => $bp->translate(Yii::$app->language)->description,
                            "class" => "img-responsive picsGall"
                        ]
                    );

                    ?>
                    <div class="element col-sm-3">
                        <a data-lightbox="blueprints"
                           data-title="<?= $bp->translate(Yii::$app->language)->description ?>" class="lbox plS"
                        href="/images/blueprints/<?= $bp->imgUrl ?>">
                        <?= $thumb ?>
                        </a>

                        <div class="view project_descr ">
                            <h3><a href="#"><?= $bp->translate(Yii::$app->language)->title ?></a></h3>
                        </div>
                    </div>
                <?
                }
                ?>
            </div>
        </div>

    </div>
</div>

<div id="news">
    <div class="line4">
        <div class="container">
            <div class="row Ama">
                <div class="col-md-12">
                    <h3><?= Yii::t("main-page", "part5-title") ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?= Yii::t("main-page", "part5-description") ?>
    </div>
</div>