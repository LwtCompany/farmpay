<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "etalon".
 *
 * @property int $id
 * @property int $dori_id
 * @property int $count
 */
class Etalon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etalon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dori_id', 'count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dori_id' => 'Dori ID',
            'count' => 'Count',
        ];
    }
}
