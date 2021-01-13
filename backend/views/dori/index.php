<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dorilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dori-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= Html::a('+', ['create'], ['class' => 'btn btn-info']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'firm_id',
            'bonus',
            'foto',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
