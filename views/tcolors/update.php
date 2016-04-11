<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tcolors */

$this->title = 'Update Tcolors: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tcolors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tcolors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
