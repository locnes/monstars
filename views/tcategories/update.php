<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tcategories */

$this->title = 'Update Categories: ' . ' ' . $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => 'Tcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tcategories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
