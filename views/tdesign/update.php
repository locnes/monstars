<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */

$this->title = 'Update T-shirt design: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'All T-shirt Designs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Update the design";
?>
<div class="tdesign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
