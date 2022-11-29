<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_student_id".
 *
 * @property int $student_id_serial_no
 * @property int $student_prog_curr_id
 * @property string $issuance_date
 * @property string $valid_from
 * @property string $valid_to
 * @property int $barcode
 * @property string|null $id_status
 * @property int|null $request_id
 *
 * @property SmStudentIdDetail[] $smStudentIdDetails
 * @property SmStudentIdStatus[] $smStudentIdStatuses
 * @property SmStudentProgrammeCurriculum $studentProgCurr
 */
class SmStudentId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_student_id';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id_serial_no', 'student_prog_curr_id', 'issuance_date', 'valid_from', 'valid_to', 'barcode'], 'required'],
            [['student_id_serial_no', 'student_prog_curr_id', 'barcode', 'request_id'], 'default', 'value' => null],
            [['student_id_serial_no', 'student_prog_curr_id', 'barcode', 'request_id'], 'integer'],
            [['issuance_date', 'valid_from', 'valid_to'], 'safe'],
            [['id_status'], 'string', 'max' => 15],
            [['student_id_serial_no'], 'unique'],
            [['student_prog_curr_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentProgrammeCurriculum::class, 'targetAttribute' => ['student_prog_curr_id' => 'student_prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
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
     * Gets query for [[SmStudentIdDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdDetails()
    {
        return $this->hasMany(SmStudentIdDetail::class, ['student_id_serial_no' => 'student_id_serial_no']);
    }

    /**
     * Gets query for [[SmStudentIdStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentIdStatuses()
    {
        return $this->hasMany(SmStudentIdStatus::class, ['student_id_serial_no' => 'student_id_serial_no']);
    }

    /**
     * Gets query for [[StudentProgCurr]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurr()
    {
        return $this->hasOne(SmStudentProgrammeCurriculum::class, ['student_prog_curriculum_id' => 'student_prog_curr_id']);
    }
}
