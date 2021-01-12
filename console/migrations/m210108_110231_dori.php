<?php

use yii\db\Migration;

/**
 * Class m210108_110231_dori
 */
class m210108_110231_dori extends Migration
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
        echo "m210108_110231_dori cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $this->createTable('dori', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200),
            'firm_id' => $this->integer(11),
            'bonus' => $this->decimal(12,2),
        ]);
    }

    public function down()
    {
        $this->dropTable('dori');
    }
}
