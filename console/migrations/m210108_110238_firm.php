<?php

use yii\db\Migration;

/**
 * Class m210108_110238_firm
 */
class m210108_110238_firm extends Migration
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
        echo "m210108_110238_firm cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('firm', [
            'id' => $this->primaryKey(),
            'name' => $this->string(200)
        ]);
    }

    public function down()
    {
        $this->dropTable('firm');
    }
}
