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
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'name',
            'format'=>"raw",
            'value'=>function($data)
            {
                return Html::a($data->name,['update','id'=>$data->id]);
            }
            ],
            ['attribute'=>'bonus',
            'format'=>"raw",
            'value'=>function($data)
            {
                return Html::a($data->bonus,['update','id'=>$data->id]);
            }
            ],
            ['attribute'=>'firm_id',
            'format'=>"raw",
            'value'=>function($data)
            {
                return Html::a($data['firm']->name,['update','id'=>$data->id]);
            }
            ],
            ['attribute'=>'foto',
            'format'=>"raw",
            'value'=>function($data)
            {
                return "<img src='../image/".$data->foto."' style='width:100px;'>";
            }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
