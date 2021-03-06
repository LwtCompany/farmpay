<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dori".
 *
 * @property int $id
 * @property string $name
 * @property int $firm_id
 * @property string $bonus
 */
class DoriApi extends Dori
{
    public function fields(){
        return [
            'id',
            'name',
            'foto'=>function($data){
                return 'http://83.221.167.17:60011/farmpay/admin/image/'.$data->foto;
            },
            'bonus'=>function($data){
                    return (double)$data->bonus;
                },
            'etalon',
            // 'tarif'=>function($data){
            //     return $data->getTarif()->select(['name'])->one();
            // },
        ];
    }
}
