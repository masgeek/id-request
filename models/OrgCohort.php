<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_cohort".
 *
 * @property int $cohort_id
 * @property string $cohort_desc
 */
class OrgCohort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_cohort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cohort_desc'], 'required'],
            [['cohort_desc'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cohort_id' => 'Cohort ID',
            'cohort_desc' => 'Cohort Desc',
        ];
    }
}
