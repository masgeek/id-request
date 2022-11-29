<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_admitted_student".
 *
 * @property int $adm_refno
 *
 * @property SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmAdmittedStudent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_admitted_student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adm_refno'], 'required'],
            [['adm_refno'], 'default', 'value' => null],
            [['adm_refno'], 'integer'],
            [['adm_refno'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'adm_refno' => 'Adm Refno',
        ];
    }

    /**
     * Gets query for [[SmStudentProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(SmStudentProgrammeCurriculum::class, ['adm_refno' => 'adm_refno']);
    }
}
