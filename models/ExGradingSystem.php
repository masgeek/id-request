<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ex_grading_system".
 *
 * @property int $grading_system_id
 *
 * @property OrgProgrammeCurriculum[] $orgProgrammeCurriculums
 */
class ExGradingSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ex_grading_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grading_system_id'], 'required'],
            [['grading_system_id'], 'default', 'value' => null],
            [['grading_system_id'], 'integer'],
            [['grading_system_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grading_system_id' => 'Grading System ID',
        ];
    }

    /**
     * Gets query for [[OrgProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgrammeCurriculums()
    {
        return $this->hasMany(OrgProgrammeCurriculum::class, ['grading_system_id' => 'grading_system_id']);
    }
}
