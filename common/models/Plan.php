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
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pharmacist_id', 'dori_id', 'count', 'date','firm_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pharmacist_id' => 'Pharmacist ID',
            'dori_id' => 'Dori ID',
            'count' => 'Count',
            'date' => 'Date',
            'firm' => 'Firma',

        ];
    }
    public function Sold($data){
        $sold=RegisterPharmacist::find()->where(['plan_id'=>$data->id,'type'=>'chiqim'])->andWhere(['>','date',strtotime(date('Y-m-01 00:00:00'))])->andWhere(['<','date',strtotime('now')])->sum('count');
        if($sold==null){
            $sold=0;
        }else{
            $sold=$sold * -1;
        }
        return $sold;
    }
}
