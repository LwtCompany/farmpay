<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register_pharmacist".
 *
 * @property int $id
 * @property int $dori_id
 * @property int $count
 * @property string $comment
 * @property int $date
 * @property int $plan_id
 * @property string $type
 */
class RegisterPharmacist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register_pharmacist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dori_id', 'count', 'date', 'plan_id','pharmacist_id','mounth'], 'integer'],
            [['plan_id','count','date','dori_id','type'], 'required'],
            [['comment'], 'string', 'max' => 255],
            [['bonus','summa'],'number'],
            [['type'], 'string', 'max' => 11],
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
            'comment' => 'Comment',
            'date' => 'Date',
            'plan_id' => 'Plan ID',
            'type' => 'Type',
        ];
    }
    public function getDori()
    {
        return $this->hasOne(Dori::className(), ['id' => 'dori_id']);
    }
}
