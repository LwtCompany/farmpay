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
class Etalonapi extends Etalon
{
    public function fields(){
        return [
            'id',
            'dori_id',
            'doriname'=>function($data){
                return $data->doriname['name'];
            },
            'count',
        ];
    }
}
