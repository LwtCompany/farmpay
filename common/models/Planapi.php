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
            // 'dori_id',
            'dori'=>function($data){
                $dori=DoriApi::findOne($data->dori_id);
                return $dori['name'];
            },
            'foto'=>function($data){
                $dori=DoriApi::findOne($data->dori_id);
                return 'http://83.221.167.17:60011/farmpay/admin/image/'.$dori['foto'];
            },
            'residue'=>function($data){
                // $sold=RegisterPharmacist::find()->where(['plan_id'=>$data->id])->andWhere(['<','date',strtotime('now')])->sum('count');
                // if($sold==null){
                //     $sold=0;
                // }
                // return (double)$sold;
                $a=$data->count-$this->Sold($data);
                return $a;
            },
            'dori_id',
            'count',
            'sold'=>function($data){
                return $data->Sold($data);
            },
        ];
    }
}
