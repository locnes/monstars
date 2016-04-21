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

            <div class="container">
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

                            <form role="form">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <h3>Step 1</h3>
                                        <p>Choose Your Shirt & Type</p>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-primary next-step">Next Step</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <h3>Step 2</h3>
                                        <p>Choose Your Design</p>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <li><button type="button" class="btn btn-primary next-step">Next Step</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h3>Step 3</h3>
                                        <p>Check Out</p>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Next Step</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="complete">
                                        <h3>Complete</h3>
                                        <p>Enjoy Your New Shirt</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>






            <div class="container">
                <div class="wizard">
                    <section>
                        <?= $content ?>

                    </section>
                </div>
            </div>



        </div>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Monstars <?= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
