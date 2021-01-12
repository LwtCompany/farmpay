<?php

use yii\db\Migration;

/**
 * Class m210111_112743_register_pharmacist
 */
class m210111_112743_register_pharmacist extends Migration
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
        echo "m210111_112743_register_pharmacist cannot be reverted.\n";

        return false;
    }
    public function up()
    {
        $this->createTable('register_pharmacist', [
            'id' => $this->primaryKey(),
            'dori_id' => $this->integer(11),
            'count' => $this->integer(11),
            'comment'=>$this->string(255),
            'date'=>$this->integer(20),
            'plan_id'=>$this->integer(11),
        ]);
    }

    public function down()
    {
        $this->dropTable('register_pharmacist');
    }
}
