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
class RegisterPharmacistapi extends RegisterPharmacist
{
    /**
     * {@inheritdoc}
     */
    public function fields(){
        return [
            'dori'=>function($data){
                $dori=DoriApi::findOne($data->dori_id);
                return $dori['name'];
            },
            'foto'=>function($data){
                $dori=DoriApi::findOne($data->dori_id);
                return 'http://83.221.167.17:60011/farmpay/admin/image/'.$dori['foto'];
            },
            'count',
            'datetime'=>function($data){
                return date('d-m-Y H:i:s',$data->date);
            },
        ];
    }
}
