<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_academic_levels".
 *
 * @property int $academic_level_id
 *
 * @property SmAcademicProgress[] $smAcademicProgresses
 */
class OrgAcademicLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_academic_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_level_id'], 'required'],
            [['academic_level_id'], 'default', 'value' => null],
            [['academic_level_id'], 'integer'],
            [['academic_level_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'academic_level_id' => 'Academic Level ID',
        ];
    }

    /**
     * Gets query for [[SmAcademicProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(SmAcademicProgress::class, ['academic_level_id' => 'academic_level_id']);
    }
}
