<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_student_status".
 *
 * @property int $status_id
 * @property string|null $status_name
 *
 * @property SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmStudentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_student_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_id'], 'required'],
            [['status_id'], 'default', 'value' => null],
            [['status_id'], 'integer'],
            [['status_name'], 'string', 'max' => 50],
            [['status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }

    /**
     * Gets query for [[SmStudentProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(SmStudentProgrammeCurriculum::class, ['status_id' => 'status_id']);
    }
}
