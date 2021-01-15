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
            [['name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'firm_id' => 'Firm',
            'bonus' => 'Bonus',
            'foto' => 'Foto',
        ];
    }
    public function getEtalon()
    {
        return $this->hasMany(Etalonapi::className(), ['dori_id' => 'id']);
    }
    public function getFirm()
    {
        return $this->hasOne(Firm::className(), ['id' => 'firm_id']);
    }
}
