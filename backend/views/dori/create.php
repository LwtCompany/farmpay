<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dori */

$this->title = 'Create Dori';
$this->params['breadcrumbs'][] = ['label' => 'Doris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
