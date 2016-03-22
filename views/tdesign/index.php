<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'T-shirt Designs';
$this->params['breadcrumbs'][] = "All Designs";
?>
<div class="tdesign-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add new T-shirt design', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'price',
            'description:ntext',
            'fileName',

            [
                'attribute' => 'Category',
                'value' => 'category.cat_name',
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusName();
                }
            ],
             //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
