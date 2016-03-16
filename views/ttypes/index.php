<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'T-Shirt Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ttypes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New T-Shirt Types', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'type_name',
            'price_add',
            [
                //'format' => 'currency',
                //NumberFormatter::CURRENCY_SYMBOL => '₽',
                //'format' => ['decimal',2],
                'attribute' => 'price_add',
            ],
            'status',

            /*
            [
                'attribute'=>'getStatusName',
                'format'=>'boolean',
            ],
            */

            'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
