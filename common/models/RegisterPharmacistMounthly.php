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
class RegisterPharmacistMounthly extends RegisterPharmacist
{
    /**
     * {@inheritdoc}
     */
    public $sum;
    public function fields(){
        return [
            'sum',
            'mounth'=>function($data){
                $monthes = array(
                    1 => 'Январь', 2 => 'Феврал', 3 => 'Март', 4 => 'Апрел',
                    5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
                    9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
                );
                return $monthes[(int)substr($data->mounth,4,2)].' '.date(substr($data->mounth,0,4));
            },
        ];
    }
}
