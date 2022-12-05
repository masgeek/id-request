<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_name_change_approval".
 *
 * @property int $name_change_approval_id
 * @property int $name_change_id
 * @property string $approval_status pending, review, closed
 * @property string|null $remarks
 * @property string $approved_by
 * @property string $approval_date
 */
class SmNameChangeApproval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_name_change_approval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_change_id', 'approval_status', 'approved_by', 'approval_date'], 'required'],
            [['name_change_id'], 'default', 'value' => null],
            [['name_change_id'], 'integer'],
            [['approval_date'], 'safe'],
            [['approval_status'], 'string', 'max' => 30],
            [['remarks'], 'string', 'max' => 250],
            [['approved_by'], 'string', 'max' => 15],
            [['name_change_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmNameChange::class, 'targetAttribute' => ['name_change_id' => 'name_change_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name_change_approval_id' => 'Name Change Approval ID',
            'name_change_id' => 'Name Change ID',
            'approval_status' => 'pending, review, closed',
            'remarks' => 'Remarks',
            'approved_by' => 'Approved By',
            'approval_date' => 'Approval Date',
        ];
    }
}
