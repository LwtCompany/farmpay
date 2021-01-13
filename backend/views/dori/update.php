<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dori */

$this->title = 'Update Dori: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Doris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
