<?php

use yii\db\Migration;

/**
 * Class m210107_053620_pharmacist
 */
class m210107_053620_pharmacist extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210107_053620_pharmacist cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('pharmacist', [
            'id' => $this->primaryKey(),
            'firm_name' => $this->string(200),
            'shop_cordinata' => $this->string(),
            'fio' => $this->string(),
            'passport_seria' => $this->string(9),
            'gender'=>$this->string(10),
            'phone'=>$this->string(25),
            'password'=>$this->string(30),
            'sms_code'=>$this->integer(12),
            'token' => $this->string(128),
            'fcm_token' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('pharmacist');
    }
}
