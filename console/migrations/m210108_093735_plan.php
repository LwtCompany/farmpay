<?php

use yii\db\Migration;

/**
 * Class m210108_093735_plan
 */
class m210108_093735_plan extends Migration
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
        echo "m210108_093735_plan cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'pharmacist_id' => $this->integer(11),
            'dori_id' => $this->integer(11),
            'count' => $this->integer(20),
            'date' => $this->integer(25),
        ]);
    }

    public function down()
    {
        $this->dropTable('plan');
    }
}
