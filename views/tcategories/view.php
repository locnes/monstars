<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use app\models\Tdesign;


/* @var $this yii\web\View */
/* @var $model app\models\Tcategories */

$this->title = $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tcategories-view">

    <h1>Category: <?= Html::encode($this->title) ?></h1>

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
            'cat_name',
            'cat_discr',
            //'status',
            [
                'attribute' => 'status',
                'value' => $model->getStatusName(),
            ],
            'sort_order',
        ],
    ]) ?>



    <? $dataProvider = new ActiveDataProvider([
    'query' => Tdesign::find()
        ->where(['categoryId' => $model->id]),
    'pagination' => [
    'pageSize' => 20,
    ],
    ]);
    echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],

        //'title',
        [
            'attribute' => 'title',
            'format' => 'raw',
           'value' => function ($data) {
                return Html::a($data->title, ['/tdesign/view', 'id' => $data->id]);
            },
    ],
        'price',

        ]
    ]);
?>

</div>
