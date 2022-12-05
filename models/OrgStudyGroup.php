<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_study_group".
 *
 * @property integer $study_group_id
 * @property string $study_group_name
 * @property string $status
 *
 * @property \app\models\OrgStudyCentreGroup[] $orgStudyCentreGroups
 */
class OrgStudyGroup extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgStudyCentreGroups'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['study_group_name'], 'required'],
            [['study_group_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_study_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'study_group_id' => 'Study Group ID',
            'study_group_name' => 'Study Group Name',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgStudyCentreGroups()
    {
        return $this->hasMany(\app\models\OrgStudyCentreGroup::className(), ['study_group_id' => 'study_group_id']);
    }
    }
