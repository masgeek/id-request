<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.ex_grading_system".
 *
 * @property integer $grading_system_id
 * @property string $grading_system_name
 * @property string $grading_system_desc
 * @property string $status
 *
 * @property \app\models\ExGradingSystemDetail[] $exGradingSystemDetails
 * @property \app\models\OrgProgrammeCurriculum[] $orgProgrammeCurriculums
 */
class ExGradingSystem extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'exGradingSystemDetails',
            'orgProgrammeCurriculums'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grading_system_name', 'grading_system_desc'], 'required'],
            [['grading_system_name'], 'string', 'max' => 20],
            [['grading_system_desc'], 'string', 'max' => 60],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.ex_grading_system';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grading_system_id' => 'Grading System ID',
            'grading_system_name' => 'Grading System Name',
            'grading_system_desc' => 'Grading System Desc',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExGradingSystemDetails()
    {
        return $this->hasMany(\app\models\ExGradingSystemDetail::className(), ['grading_system_id' => 'grading_system_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\OrgProgrammeCurriculum::className(), ['grading_system_id' => 'grading_system_id']);
    }
    }
