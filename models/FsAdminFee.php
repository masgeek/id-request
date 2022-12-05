<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.fs_admin_fees".
 *
 * @property int $admin_fee_id
 * @property string $name
 * @property string $description
 * @property string $status
 */
class FsAdminFee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.fs_admin_fees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_fee_id', 'name', 'description', 'status'], 'required'],
            [['admin_fee_id'], 'default', 'value' => null],
            [['admin_fee_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15],
            [['admin_fee_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_fee_id' => 'Admin Fee ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
