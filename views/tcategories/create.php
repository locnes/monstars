<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tcategories */

$this->title = 'Create Tcategories';
$this->params['breadcrumbs'][] = ['label' => 'Tcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tcategories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
