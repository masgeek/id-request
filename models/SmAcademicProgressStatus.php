<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sm_academic_progress_status".
 *
 * @property int $progress_status_id
 *
 * @property SmAcademicProgress[] $smAcademicProgresses
 */
class SmAcademicProgressStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sm_academic_progress_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['progress_status_id'], 'required'],
            [['progress_status_id'], 'default', 'value' => null],
            [['progress_status_id'], 'integer'],
            [['progress_status_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'progress_status_id' => 'Progress Status ID',
        ];
    }

    /**
     * Gets query for [[SmAcademicProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(SmAcademicProgress::class, ['progress_status_id' => 'progress_status_id']);
    }
}
