<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_name_change".
 *
 * @property integer $name_change_id
 * @property string $request_date
 * @property integer $student_id
 * @property string $new_surname
 * @property string $new_othernames
 * @property string $reason
 * @property string $document_url
 * @property string $current_surname
 * @property string $current_othernames
 * @property string $status
 *
 * @property \app\models\SmStudent $student
 * @property \app\models\SmNameChangeApproval[] $smNameChangeApprovals
 */
class SmNameChange extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'student',
            'smNameChangeApprovals'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_date', 'student_id', 'reason', 'status'], 'required'],
            [['request_date'], 'safe'],
            [['student_id'], 'integer'],
            [['new_surname', 'current_surname', 'status'], 'string', 'max' => 20],
            [['new_othernames', 'current_othernames'], 'string', 'max' => 50],
            [['reason', 'document_url'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_name_change';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name_change_id' => 'Name Change ID',
            'request_date' => 'Request Date',
            'student_id' => 'Student ID',
            'new_surname' => 'New Surname',
            'new_othernames' => 'New Othernames',
            'reason' => 'Reason',
            'document_url' => 'Document Url',
            'current_surname' => 'Current Surname',
            'current_othernames' => 'Current Othernames',
            'status' => 'PENDING, REVIEW, APPROVED, DISAPPROVED',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(\app\models\SmStudent::className(), ['student_id' => 'student_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmNameChangeApprovals()
    {
        return $this->hasMany(\app\models\SmNameChangeApproval::className(), ['name_change_id' => 'name_change_id']);
    }
    }
