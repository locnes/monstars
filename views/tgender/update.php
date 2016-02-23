<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tgender */

$this->title = 'Update Gender Type: ' . ' ' . $model->g_name;
$this->params['breadcrumbs'][] = ['label' => 'Manage Gender', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->g_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tgender-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
