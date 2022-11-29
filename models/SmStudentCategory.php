<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_student_category".
 *
 * @property int $std_category_id
 * @property string|null $student_category_name
 *
 * @property SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmStudentCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_student_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_category_id'], 'required'],
            [['std_category_id'], 'default', 'value' => null],
            [['std_category_id'], 'integer'],
            [['student_category_name'], 'string', 'max' => 50],
            [['std_category_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'std_category_id' => 'Std Category ID',
            'student_category_name' => 'Student Category Name',
        ];
    }

    /**
     * Gets query for [[SmStudentProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(SmStudentProgrammeCurriculum::class, ['student_category_id' => 'std_category_id']);
    }
}
