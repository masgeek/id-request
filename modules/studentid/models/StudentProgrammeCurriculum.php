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
//        $h = new StudentProgrammeCurriculum();
//        $t = $h->progCurriculum->prog_curriculum_desc
        $data = self::find()
            ->joinWith('progCurriculum')
            ->orderBy('student_prog_curriculum_id')
            ->asArray()
            ->all();

        return ArrayHelper::map($data, 'student_prog_curriculum_id', 'progCurriculum.prog_curriculum_desc');
    }
}