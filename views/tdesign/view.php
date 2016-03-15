<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'All Designs', 'url' => ['index']];
$this->params['breadcrumbs'][] = "\"" . $this->title . "\" Design";
?>
<div class="tdesign-view">

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
            //'id',
            'title',
            'price',
            'description:ntext',
            'fileName',
            //'category',
            'status',
        ],
    ]) ?>

</div>
