<?php

use yii\db\Migration;

/**
 * Class m221205_121700_seed_id_request_type
 */
class m221205_121700_seed_id_request_type extends Migration
{
    public $tableName = 'smis.sm_id_request_type';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert($this->tableName, ['request_type_id' => 1, 'id_type_desc' => 'NEW']);
        $this->insert($this->tableName, ['request_type_id' => 2, 'id_type_desc' => 'REPLACEMENT']);
        $this->insert($this->tableName, ['request_type_id' => 3, 'id_type_desc' => 'RENEWAL']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221205_121700_seed_id_request_type cannot be reverted.\n";

        return true;
    }
}
