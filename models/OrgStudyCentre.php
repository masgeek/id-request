<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_study_centre".
 *
 * @property integer $study_centre_id
 * @property string $study_centre_name
 * @property string $status
 *
 * @property \app\models\OrgStudyCentreGroup[] $orgStudyCentreGroups
 */
class OrgStudyCentre extends \yii\db\ActiveRecord
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
            [['study_centre_name'], 'required'],
            [['study_centre_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_study_centre';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'study_centre_id' => 'Study Centre ID',
            'study_centre_name' => 'Study Centre Name',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgStudyCentreGroups()
    {
        return $this->hasMany(\app\models\OrgStudyCentreGroup::className(), ['study_centre_id' => 'study_centre_id']);
    }
    }
