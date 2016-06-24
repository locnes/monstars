<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'T-Shirt Sizes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tsizes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New T-Shirt Size', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'size_name',
            'size_fullname',
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
                'value' => function ($data) {
                    return $data->getStatusName();
                }
            ], 'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
