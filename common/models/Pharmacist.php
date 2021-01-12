<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pharmacist".
 *
 * @property int $id
 * @property string $firm_name
 * @property string $lat
 * @property string $long
 * @property string $fio
 * @property string $passport_seria
 * @property string $gender
 * @property string $phone
 * @property string $password
 * @property int $sms_code
 * @property string $token
 * @property string $fcm_token
 * @property string $status
 */
class Pharmacist extends \yii\db\ActiveRecord
{
    const ACTIVE='active';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pharmacist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['long', 'status'], 'required'],
            [['sms_code','plan_id'], 'integer'],
            [['firm_name'], 'string', 'max' => 200],
            [['lat', 'long'], 'string', 'max' => 100],
            [['fio', 'fcm_token'], 'string', 'max' => 255],
            [['passport_seria'], 'string', 'max' => 9],
            [['gender'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 25],
            [['phone'],'unique'],
            [['password', 'status'], 'string', 'max' => 30],
            [['token'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firm_name' => 'Firm Name',
            'lat' => 'Lat',
            'long' => 'Long',
            'fio' => 'Fio',
            'passport_seria' => 'Passport Seria',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'password' => 'Password',
            'sms_code' => 'Sms Code',
            'token' => 'Token',
            'fcm_token' => 'Fcm Token',
            'status' => 'Status',
        ];
    }
    public function findToken($token){
        return self::find()->where(['token' => $token])->one();
    }
}
