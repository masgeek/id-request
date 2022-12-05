<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_study_centre_group".
 *
 * @property integer $study_centre_group_id
 * @property integer $study_centre_id
 * @property integer $study_group_id
 * @property string $status
 *
 * @property \app\models\OrgProgCurrSemesterGroup[] $orgProgCurrSemesterGroups
 * @property \app\models\OrgStudyCentre $studyCentre
 * @property \app\models\OrgStudyGroup $studyGroup
 */
class OrgStudyCentreGroup extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgCurrSemesterGroups',
            'studyCentre',
            'studyGroup'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['study_centre_id', 'study_group_id'], 'required'],
            [['study_centre_id', 'study_group_id'], 'integer'],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_study_centre_group';
    }

    /**
     * @inheritdoc
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesterGroups()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemesterGroup::className(), ['study_centre_group_id' => 'study_centre_group_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyCentre()
    {
        return $this->hasOne(\app\models\OrgStudyCentre::className(), ['study_centre_id' => 'study_centre_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudyGroup()
    {
        return $this->hasOne(\app\models\OrgStudyGroup::className(), ['study_group_id' => 'study_group_id']);
    }
    }
