<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$lang = Yii::$app->language;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="headerLine">
    <div id="menuF" class="default">
        <div class="container">
            <div class="row">
                <div class="logo col-md-4">
                    <div>
                        <a href="/">
                            <img src="/images/logo-wh.png">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="navmenu" style="text-align: center;">
                        <ul id="menu">
                            <li class="active inpage"><a href="/#home"><?= Yii::t("nav", "Location") ?></a></li>
                            <li class="inpage"><a href="/#about"><?= Yii::t("nav", "Concept") ?></a></li>
                            <li><a href="/<?= $lang ?>/page/1"><?= Yii::t("nav", "Mall") ?></a></li>
                            <li><a href="/<?= $lang ?>/page/2"><?= Yii::t("nav", "Business Center") ?></a></li>
                            <li class="inpage last"><a href="/#contact"><?= Yii::t("nav", "Contact") ?></a></li>
                            <?
                            if (Yii::$app->language == "az")
                                $secondLang = "ru";
                            else
                                $secondLang = "az";
                            ?>
                            <li><a href="/<?= $secondLang ?>"><?= strtoupper($secondLang) ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row wrap">
            <div class="col-md-12 gallery">
                <div class="camera_wrap camera_white_skin" id="camera_wrap_1">
                    <div data-thumb="" data-src="/images/slides/blank.gif">
                        <div class="img-responsive camera_caption fadeFromBottom">
                            <h2><?= Yii::t("common", "slider-text 1") ?></h2>
                        </div>
                    </div>
                    <div data-thumb="" data-src="/images/slides/blank.gif">
                        <div class="img-responsive camera_caption fadeFromBottom">
                            <h2><?= Yii::t("common", "slider-text 2") ?></h2>
                        </div>
                    </div>
                    <div data-thumb="" data-src="/images/slides/blank.gif">
                        <div class="img-responsive camera_caption fadeFromBottom">
                            <h2><?= Yii::t("common", "slider-text 3") ?></h2>
                        </div>
                    </div>
                </div>
                <!-- #camera_wrap_1 -->
            </div>
        </div>
    </div>
</div>
<?= $content ?>

<div id="contact">

    <div class="lineBlack">
        <div class="container">
            <div class="row downLine">
                <div class="col-md-6 col-sm-6 col-xs-12 text-left copy">
                    <img src="/images/logo-wh.png" width="150">
                </div>
                <div class="contacts col-md-6 col-sm-6 col-xs-12 text-right">
                    C.Cabbarli 609. meh, qapı 1.
                    <br>info@globuscenter.az
                    <br>+994 55 304 1717
                    <br>+994 12 597 5501
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
