<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_study_centre_group".
 *
 * @property int $study_centre_group_id
 * @property int $study_centre_id
 * @property int $study_group_id
 * @property string $status
 */
class OrgStudyCentreGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_study_centre_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['study_centre_id', 'study_group_id'], 'required'],
            [['study_centre_id', 'study_group_id'], 'default', 'value' => null],
            [['study_centre_id', 'study_group_id'], 'integer'],
            [['status'], 'string', 'max' => 10],
            [['study_centre_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgStudyCentre::class, 'targetAttribute' => ['study_centre_id' => 'study_centre_id']],
            [['study_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgStudyGroup::class, 'targetAttribute' => ['study_group_id' => 'study_group_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'study_centre_group_id' => 'Study Centre Group ID',
            'study_centre_id' => 'Study Centre ID',
            'study_group_id' => 'Study Group ID',
            'status' => 'Status',
        ];
    }
}
