<?php

use yii\db\Migration;

/**
 * Class m210108_110250_etalon
 */
class m210108_110250_etalon extends Migration
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
        echo "m210108_110250_etalon cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('etalon', [
            'id' => $this->primaryKey(),
            'dori_id' => $this->integer(11),
            'count' => $this->integer(11),
        ]);
    }

    public function down()
    {
        $this->dropTable('etalon');
    }
}
