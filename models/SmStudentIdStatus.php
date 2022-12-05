<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_student_id_status".
 *
 * @property int $id_status_no
 * @property string $status_name
 * @property int $student_id_serial_no
 */
class SmStudentIdStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_student_id_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_status_no', 'status_name', 'student_id_serial_no'], 'required'],
            [['id_status_no', 'student_id_serial_no'], 'default', 'value' => null],
            [['id_status_no', 'student_id_serial_no'], 'integer'],
            [['status_name'], 'string', 'max' => 20],
            [['id_status_no'], 'unique'],
            [['student_id_serial_no'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentId::class, 'targetAttribute' => ['student_id_serial_no' => 'student_id_serial_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_status_no' => 'Id Status No',
            'status_name' => 'Status Name',
            'student_id_serial_no' => 'Student Id Serial No',
        ];
    }
}
