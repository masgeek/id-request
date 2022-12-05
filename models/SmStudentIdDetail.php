<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_id_details".
 *
 * @property integer $stud_id_det_id
 * @property integer $student_id_serial_no
 * @property string $student_id_status
 * @property string $remarks
 * @property string $status_date
 *
 * @property \app\models\SmStudentId $studentIdSerialNo
 */
class SmStudentIdDetail extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'studentIdSerialNo'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_id_det_id', 'student_id_serial_no', 'student_id_status', 'remarks', 'status_date'], 'required'],
            [['stud_id_det_id', 'student_id_serial_no'], 'integer'],
            [['student_id_status', 'remarks'], 'string'],
            [['status_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_id_details';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stud_id_det_id' => 'Stud Id Det ID',
            'student_id_serial_no' => 'Student Id Serial No',
            'student_id_status' => 'Student Id Status',
            'remarks' => 'Remarks',
            'status_date' => 'Status Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentIdSerialNo()
    {
        return $this->hasOne(\app\models\SmStudentId::className(), ['student_id_serial_no' => 'student_id_serial_no']);
    }
    }
