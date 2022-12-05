<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_id_status".
 *
 * @property integer $id_status_no
 * @property string $status_name
 * @property integer $student_id_serial_no
 *
 * @property \app\models\SmStudentId $studentIdSerialNo
 */
class SmStudentIdStatus extends \yii\db\ActiveRecord
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
            [['id_status_no', 'status_name', 'student_id_serial_no'], 'required'],
            [['id_status_no', 'student_id_serial_no'], 'integer'],
            [['status_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_id_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_status_no' => 'Id Status No',
            'status_name' => 'Status Name',
            'student_id_serial_no' => 'Student Id Serial No',
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
