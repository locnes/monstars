<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'All Designs', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Details about the \"" . $this->title . "\" design";
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
            //'categoryId',
            [
                'attribute' => 'category.cat_name',
                'label' => 'Category name',
            ],
            [
                'attribute' => 'category',
                'value' => $model->getStatusName(),
            ],
            'status',
        ],
    ]) ?>

</div>
