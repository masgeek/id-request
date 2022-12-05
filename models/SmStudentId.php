<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_id".
 *
 * @property integer $student_id_serial_no
 * @property integer $student_prog_curr_id
 * @property string $issuance_date
 * @property string $valid_from
 * @property string $valid_to
 * @property integer $barcode
 * @property string $id_status
 * @property integer $request_id
 *
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurr
 * @property \app\models\SmStudentIdDetail[] $smStudentIdDetails
 * @property \app\models\SmStudentIdStatus[] $smStudentIdStatuses
 */
class SmStudentId extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'studentProgCurr',
            'smStudentIdDetails',
            'smStudentIdStatuses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id_serial_no', 'student_prog_curr_id', 'issuance_date', 'valid_from', 'valid_to', 'barcode'], 'required'],
            [['student_id_serial_no', 'student_prog_curr_id', 'barcode', 'request_id'], 'integer'],
            [['issuance_date', 'valid_from', 'valid_to'], 'safe'],
            [['id_status'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_id';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id_serial_no' => 'Student Id Serial No',
            'student_prog_curr_id' => 'Student Prog Curr ID',
            'issuance_date' => 'Issuance Date',
            'valid_from' => 'Valid From',
            'valid_to' => 'Valid To',
            'barcode' => 'Barcode',
            'id_status' => 'Id Status',
            'request_id' => 'Request ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurr()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curr_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdDetails()
    {
        return $this->hasMany(\app\models\SmStudentIdDetail::className(), ['student_id_serial_no' => 'student_id_serial_no']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdStatuses()
    {
        return $this->hasMany(\app\models\SmStudentIdStatus::className(), ['student_id_serial_no' => 'student_id_serial_no']);
    }
    }
