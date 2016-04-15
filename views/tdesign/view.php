<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'All T-shirt Designs', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Details about the \"" . $this->title . "\" design";
?>
<div class="tdesign-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= Html::showFlashMessages(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            [
                'attribute' => 'price',
                'format' => [
                    'currency',
                    'USD',
                    [
                        \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                        \NumberFormatter::MAX_FRACTION_DIGITS => 2,
                    ]
                ],
            ],
            // https://silverdecisions.wordpress.com/2015/03/27/simple-colum-formatting-in-yii-2-gridview/
            'description:html',
            [
                'attribute' => 'fileName',
                'format' => 'raw',
                'value' => $model->fileName != null ?
                    $model->getImageUrl() . "<br />" .
                    Html::img($model->getImageUrl(), [
                        'width' => '200',
                        'class' => 'img-rounded img-thumbnail img-responsive',
                        'alt' => $model->title,
                        'title' => $model->title
                    ]) : "<span class='emptyCell'>none</span>",
            ],
//            [
//                'attribute' => 'category.cat_name',
//                'label' => 'Category name',
//            ],
            [
                'attribute' => 'category',
                'format' => 'raw',
                'value' => Html::a($model->category->cat_name, ['tcategories/update', 'id' => $model->categoryId]),
            ],
            [
                'attribute' => 'status',
                'value' => $model->getStatusName(),
            ],

        ],
    ]) ?>

</div>
