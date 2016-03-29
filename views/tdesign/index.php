<?php

use app\models\Tcategories;
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
        'filterModel' => $searchModel,
        'emptyText' => "No T-Shirt designs found with the given criteria.",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'price',
            'description:html',
            'fileName',
            //'categoryId',
            [
                'attribute' => 'category',
                'value' => 'category.cat_name',
                'filter' => Tcategories::dropDownMenu(),
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
