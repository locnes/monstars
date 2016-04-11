<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tcolors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tcolors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tcolors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'color',
            'status',
            'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
