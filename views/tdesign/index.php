<?php

use app\models\Tcategories;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
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

    <?= Html::showFlashMessages(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'emptyText' => "No T-shirt designs found with the given criteria.",
        //'emptyCell' => Html::a('x', ['index']),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'price',
            [
                'attribute' => 'price',
                'format' => [
                    'currency',
                    'USD',
                    [
                        \NumberFormatter::MIN_FRACTION_DIGITS => 2,
                        \NumberFormatter::MAX_FRACTION_DIGITS => 2,
                    ]
                ],
            ],
            'description:html',
            [
                'attribute' => 'fileName',
                'label' => 'Image',
                'format' => 'raw',
                'value' => function (\app\models\Tdesign $model) {
                    if ($model->fileName != null) {
                        return Html::img($model->getImageUrl(), [
                            'width' => '70',
                            'class' => 'img-rounded img-responsive',
                            'alt' => $model->title,
                            'title' => $model->title,
                            'data-toggle' => 'popover',
                            'data-trigger' => 'hover',
                            //'data-placement' => 'top',
                            'data-content' => '<img src="' . $model->getImageUrl() . '" width="150" />"',
                        ]);
                    } else {
                        return "<span class='emptyCell'>none</span>";
                    }
                },
                'filter' => false,
            ],
            //'categoryId',
            [
                'attribute' => 'category',
                //'value' => 'category.cat_name',
                'format' => 'raw',
                'value' => function ($model, $key, $index) {
                    return Html::a($model->category->cat_name, ['tcategories/view', 'id' => $model->categoryId]);
                },
                'filter' => Html::activeDropDownList($searchModel, 'categoryId', ArrayHelper::map(Tcategories::find()->asArray()->all(), 'id', 'cat_name'), ['class' => 'form-control', 'prompt' => 'all']),
            ],
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a('x', ['index']),
                'headerOptions' => ['style' => 'text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center; white-space: nowrap;'],
            ],
        ],
    ]); ?>

</div>
