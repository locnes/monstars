<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tdesigns';
$this->params['breadcrumbs'][] = "Design";
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
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
