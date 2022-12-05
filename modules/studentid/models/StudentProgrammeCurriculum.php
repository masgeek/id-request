<?php

namespace app\modules\studentid\models;

use yii\helpers\ArrayHelper;

/**
 * {@inheritdoc}
 */
class StudentProgrammeCurriculum extends \app\models\SmStudentProgrammeCurriculum
{

    /**
     * @return array
     */
    public static function getCurriculum(): array
    {
        $data = self::find()
            ->orderBy('student_prog_curriculum_id')
            ->asArray()
            ->all();

        return ArrayHelper::map($data, 'student_prog_curriculum_id', 'student_prog_curriculum_id');

    }
}