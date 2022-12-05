<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_readmission".
 *
 * @property integer $readmission_id
 * @property integer $stud_prog_curr_id
 * @property string $entry_date
 * @property string $reason
 * @property string $registration_no
 * @property string $approval_status
 * @property string $entry_remarks
 * @property string $approval_remarks
 * @property string $entered_by
 * @property string $approved_by
 * @property string $approval_date
 */
class SmReadmission extends \yii\db\ActiveRecord
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
            [['readmission_id', 'stud_prog_curr_id', 'entry_date'], 'required'],
            [['readmission_id', 'stud_prog_curr_id'], 'integer'],
            [['entry_date', 'approval_date'], 'safe'],
            [['reason', 'entry_remarks', 'approval_remarks'], 'string', 'max' => 250],
            [['registration_no'], 'string', 'max' => 50],
            [['approval_status'], 'string', 'max' => 30],
            [['entered_by', 'approved_by'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_readmission';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'readmission_id' => 'Readmission ID',
            'stud_prog_curr_id' => 'Stud Prog Curr ID',
            'entry_date' => 'Entry Date',
            'reason' => 'Reason',
            'registration_no' => 'Registration No',
            'approval_status' => 'Approval Status',
            'entry_remarks' => 'Entry Remarks',
            'approval_remarks' => 'Approval Remarks',
            'entered_by' => 'Entered By',
            'approved_by' => 'Approved By',
            'approval_date' => 'Approval Date',
        ];
    }
}
