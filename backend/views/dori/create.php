<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dori */

$this->title = 'Dori qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Doris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dori-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
