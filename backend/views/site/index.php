<?php
/* @var $this yii\web\View */

$this->title = 'Administration';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">Please click on one of following links to start administration</p>

    </div>


    <div class="row">
        <?php
        foreach ($nav as $menuItem) {
            ?>
            <div class="col-lg-3 admin-main-menu">

                <a class="btn btn-default btn-block"
                   href="<?= $menuItem["url"] ?>"><?= $menuItem["title"] ?></a>

            </div>
        <?
        }
        ?>

    </div>

</div>