<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dori-form">

    <?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firm_id')->textInput() ?>

    <?= $form->field($model, 'bonus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->fileInput(['maxlength' => true, 'multiple' => false, 'accept' => 'web/image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
