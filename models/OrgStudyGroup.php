<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_study_group".
 *
 * @property int $study_group_id
 * @property string $study_group_name
 * @property string $status
 */
class OrgStudyGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_study_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['study_group_name'], 'required'],
            [['study_group_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'study_group_id' => 'Study Group ID',
            'study_group_name' => 'Study Group Name',
            'status' => 'Status',
        ];
    }
}
