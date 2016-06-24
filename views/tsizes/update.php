<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tsizes */

$this->title = 'Update Size: ' . ' ' . $model->size_fullname;
$this->params['breadcrumbs'][] = ['label' => 'T-shirt size', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->size_fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tsizes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
