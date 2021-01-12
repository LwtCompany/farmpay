<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property int $pharmacist_id
 * @property int $dori_id
 * @property int $count
 * @property int $date
 */
class Planapi extends Plan
{
    /**
     * {@inheritdoc}
     */
    public function fields(){
        return [
            'id',
            'dori_id',
            'count',
            'sold'=>function($data){
                return RegisterPharmacist::find()->where(['plan_id'=>$data->id,'type'=>'chiqim','date'=>date('Ym')])->sum('count');
            },
        ];
    }
}
