<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_admissions_approval".
 *
 * @property string $approval_comment
 * @property integer $adm_approval_id
 * @property string $approver
 * @property string $approval_date
 * @property integer $intake_id
 */
class SmAdmissionsApproval extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            ''
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['approval_comment', 'approver'], 'string'],
            [['adm_approval_id', 'approver', 'approval_date', 'intake_id'], 'required'],
            [['adm_approval_id', 'intake_id'], 'integer'],
            [['approval_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_admissions_approval';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'approval_comment' => 'Approval Comment',
            'adm_approval_id' => 'Adm Approval ID',
            'approver' => 'Approver',
            'approval_date' => 'Approval Date',
            'intake_id' => 'Intake ID',
        ];
    }
}
