<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */

$this->title = 'Create Tdesign';
$this->params['breadcrumbs'][] = ['label' => 'Tdesigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tdesign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
