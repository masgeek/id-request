<?php

namespace app\modules\studentid\models;

class StudentIdRequest extends \app\models\SmStudentIdRequest
{

    public static function tableName(): string
    {
        return parent::tableName();
    }

    public function attributeLabels(): array
    {
        $labels = parent::attributeLabels();

        $labels['request_type_id'] = 'Request type';

        return $labels;
    }
}