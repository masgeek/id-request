<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_semester_type".
 *
 * @property integer $sem_type_id
 * @property string $sem_type
 *
 * @property \app\models\OrgProgCurrSemester[] $orgProgCurrSemesters
 */
class OrgSemesterType extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'orgProgCurrSemesters'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sem_type'], 'required'],
            [['sem_type'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_semester_type';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sem_type_id' => 'Sem Type ID',
            'sem_type' => 'Sem Type',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrSemesters()
    {
        return $this->hasMany(\app\models\OrgProgCurrSemester::className(), ['semester_type_id' => 'sem_type_id']);
    }
    }
