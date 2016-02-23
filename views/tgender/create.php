<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tgender */

$this->title = 'Create Tgender';
$this->params['breadcrumbs'][] = ['label' => 'Tgenders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tgender-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
