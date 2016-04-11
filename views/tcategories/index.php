<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tcategories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cat_name', /* This handles showing "empty" text in the Description column */
            [
                'attribute' => 'cat_discr',
                'format' => 'raw',
                'value' => function (\app\models\Tcategories $model) {
                    if ($model->cat_discr != null) {
                        return $model->cat_discr;
                    } else {
                        return "<span class='emptyCell'>none</span>";
                    }
                },
            ],
//            'status',   // Just regular "status" column value from database
//             But this is the "status name" that corresponds to the "status" column value from extended class
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
