<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Dori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dori-form">

    <?php $form = ActiveForm::begin(['options'=>['multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firm_id')->dropDownList(
            ArrayHelper::map(common\models\Firm::find()->asArray()->all(), 'id', 'name')
            )
?>
    <?= $form->field($model, 'bonus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->fileInput(['maxlength' => true, 'multiple' => false, 'accept' => 'image/*']) ?>
    <img src="../image/<?=$model->foto?>" alt="" style='150px;'>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
