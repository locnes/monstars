<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tsizes */

$this->title = 'Create Tsizes';
$this->params['breadcrumbs'][] = ['label' => 'T-Shirt Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tsizes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
