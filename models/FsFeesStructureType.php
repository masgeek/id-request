<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_fees_structure_types".
 *
 * @property int $fee_structure_type_id
 * @property string $name
 * @property string $description
 * @property string $currency
 * @property string $status
 * @property string $date_entered
 * @property float|null $exchange_rate
 */
class FsFeesStructureType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_fees_structure_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fee_structure_type_id', 'name', 'description', 'currency', 'status', 'date_entered'], 'required'],
            [['fee_structure_type_id'], 'default', 'value' => null],
            [['fee_structure_type_id'], 'integer'],
            [['date_entered'], 'safe'],
            [['exchange_rate'], 'number'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['currency'], 'string', 'max' => 10],
            [['status'], 'string', 'max' => 15],
            [['fee_structure_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'name' => 'Name',
            'description' => 'Description',
            'currency' => 'Currency',
            'status' => 'Status',
            'date_entered' => 'Date Entered',
            'exchange_rate' => 'Exchange Rate',
        ];
    }
}
