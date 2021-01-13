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
class Dori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firm_id'], 'integer'],
            [['bonus'], 'number'],
            [['name','foto'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'firm_id' => 'Firm ID',
            'bonus' => 'Bonus',
            'foto' => 'Foto',
        ];
    }
    public function getEtalon()
    {
        return $this->hasMany(Etalon::className(), ['dori_id' => 'id']);
    }
}
