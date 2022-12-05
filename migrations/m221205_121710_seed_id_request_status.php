<?php

use yii\db\Migration;

/**
 * Class m221205_121710_seed_id_request_status
 */
class m221205_121710_seed_id_request_status extends Migration
{
    public $tableName = 'smis.sm_id_request_status';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->tableName, ['status_id' => 1, 'status_name' => 'ISSUED']);
        $this->insert($this->tableName, ['status_id' => 2, 'status_name' => 'PENDING']);
        $this->insert($this->tableName, ['status_id' => 3, 'status_name' => 'REJECTED']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221205_121710_seed_id_request_status cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221205_121710_seed_id_request_status cannot be reverted.\n";

        return false;
    }
    */
}
