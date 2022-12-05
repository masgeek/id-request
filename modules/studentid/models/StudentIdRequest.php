<?php

namespace app\modules\studentid\models;

class StudentIdRequest extends \app\models\SmStudentIdRequest
{

    public static function tableName(): string
    {
        return parent::tableName();
    }

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['request_id'], 'safe'];

        return $rules;
    }

    public function attributeLabels(): array
    {
        $labels = parent::attributeLabels();

        $labels['request_type_id'] = 'Request type';
        $labels['request_date'] = 'Request date';
        $labels['status_id'] = 'Request status';
        $labels['source'] = 'Request reason';

        return $labels;
    }

    public function attributeHints(): array
    {
        $hints = parent::attributeHints();

        $hints['source'] = 'Request reason';
        return $hints;
    }
}