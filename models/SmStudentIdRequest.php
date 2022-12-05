<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_id_request".
 *
 * @property integer $request_id
 * @property integer $request_type_id
 * @property integer $student_prog_curr_id
 * @property string $request_date
 * @property integer $status_id
 * @property string $source
 *
 * @property \app\models\SmIdRequestStatus $status
 * @property \app\models\SmIdRequestType $requestType
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurr
 */
class SmStudentIdRequest extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'status',
            'requestType',
            'studentProgCurr'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'request_type_id', 'student_prog_curr_id', 'request_date', 'status_id', 'source'], 'required'],
            [['request_id', 'request_type_id', 'student_prog_curr_id', 'status_id'], 'integer'],
            [['request_date'], 'safe'],
            [['source'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_id_request';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'request_id' => 'Request ID',
            'request_type_id' => 'Request Type ID',
            'student_prog_curr_id' => 'Student Prog Curr ID',
            'request_date' => 'Request Date',
            'status_id' => 'Status ID',
            'source' => 'Source',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\app\models\SmIdRequestStatus::className(), ['status_id' => 'status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequestType()
    {
        return $this->hasOne(\app\models\SmIdRequestType::className(), ['request_type_id' => 'request_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurr()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curr_id']);
    }
    }
