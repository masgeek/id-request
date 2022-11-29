<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org_academic_session".
 *
 * @property int $acad_session_id
 * @property string $acad_session_name
 * @property string|null $acad_session_desc
 * @property string $start_date
 * @property string $end_date
 *
 * @property SmAcademicProgress[] $smAcademicProgresses
 */
class OrgAcademicSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org_academic_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acad_session_id', 'acad_session_name', 'start_date', 'end_date'], 'required'],
            [['acad_session_id'], 'default', 'value' => null],
            [['acad_session_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['acad_session_name'], 'string', 'max' => 50],
            [['acad_session_desc'], 'string', 'max' => 150],
            [['acad_session_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'acad_session_id' => 'Acad Session ID',
            'acad_session_name' => 'Acad Session Name',
            'acad_session_desc' => 'Acad Session Desc',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * Gets query for [[SmAcademicProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSmAcademicProgresses()
    {
        return $this->hasMany(SmAcademicProgress::class, ['acad_session_id' => 'acad_session_id']);
    }
}
