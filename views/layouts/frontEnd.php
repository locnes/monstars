<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;

use yii\helpers\Html;


AppAsset::register($this);
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotronHeader">
                <h1>Monstars</h1>
            </div>



            <ul class="breadcrumb">
                    <div id="headerStatusBar">

                        <div class = "progress progress-striped active">
                        <div class = "progress-bar progress-bar-success" role = "progressbar"
                         aria-valuenow = "60=" aria-valuemin = "0" aria-valuemax = "100" style = "width: 50%;">

                        <span class = "sr-only">Progress</span>
                        </div>
                        </div>
                    </div>






            </ul>


            <?= $content ?>


            <div class="jumbotron">
                <p>
                    <a class="btn btn-primary btn-large" href="#">Learn more</a>
                </p>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Monstars <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
