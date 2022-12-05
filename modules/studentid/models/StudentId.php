<?php

namespace app\modules\studentid\models;

/**
 *
 * @property string $id_remarks
 */
class StudentId extends \app\models\SmStudentId
{

    public $id_remarks;


    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['id_remarks'], 'required'];
        return $rules;
    }

    /**
     * @return array|string[]
     */
    public function attributeLabels(): array
    {
        $labels = parent::attributeLabels();
        $labels['student_id_serial_no'] = 'Serial number';
        $labels['student_prog_curr_id'] = 'Programme';
        $labels['id_remarks'] = 'Remarks';
        $labels['id_status'] = 'Status';
        return $labels;
    }
}