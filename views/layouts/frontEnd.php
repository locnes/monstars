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
<body class="orderForm">
<?php $this->beginBody() ?>

<div class="col-md-12">
    <?= Html::img('@images/Monstars_Logo.gif', ['alt' => 'Monstars Logo', 'class' => 'pull-right img-responsive']); ?>
    <div class="page-logo">
        <h1>
            LayoutIt!
            <small>Custom T-shirts</small>
        </h1>
    </div>
</div>







<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotronHeader">
                <h1>Designs For Shirts In Mind</h1>
            </div>

            <?php /*
            <div class="container" style="display: none;">
                <div class="row">
                    <section>
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">

                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                                        </a>
                                    </li>

                                    <li role="presentation" class="disabled">
                                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            */ ?>






            <div class="container">
                <section>
                    <div class='wizard'>
                        <?= $content; ?>
                    </div><!-- closes wizard div from WizardMenu::post() -->
                </section>
            </div>



        </div>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Cratolsen <?= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
