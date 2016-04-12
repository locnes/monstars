<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tcolors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Color', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'color',
            //'status',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusName();
                }
            ],
            'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
