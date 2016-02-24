<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tgender */

$this->title = $model->g_name;
$this->params['breadcrumbs'][] = ['label' => 'Gender', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tgender-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'g_name',
            'status',
            'sort_order',
        ],
    ]) ?>

</div>
