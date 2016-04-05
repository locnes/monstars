<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tsizes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'T-Shirt sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tsizes-view">

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
            'type_name',
            [
                'attribute' => 'price_add',
                'format' => [
                    'currency',
                    'USD',
                    [
                        \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                        \NumberFormatter::MAX_FRACTION_DIGITS => 2,
                    ]
                ],
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusName(),
            ],
            'sort_order',
        ],
    ]) ?>

</div>
