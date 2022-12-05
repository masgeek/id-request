<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.org_prog_curr_option".
 *
 * @property integer $option_id
 * @property string $option_code
 * @property string $option_name
 * @property integer $prog_cur_id
 * @property string $option_desc
 * @property string $option_status
 * @property string $progress_type
 *
 * @property \app\models\OrgProgrammeCurriculum $progCur
 * @property \app\models\OrgProgCurrOptionCourse[] $orgProgCurrOptionCourses
 */
class OrgProgCurrOption extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'progCur',
            'orgProgCurrOptionCourses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_code', 'option_name', 'prog_cur_id', 'option_status'], 'required'],
            [['prog_cur_id'], 'integer'],
            [['option_code'], 'string', 'max' => 10],
            [['option_name'], 'string', 'max' => 25],
            [['option_desc'], 'string', 'max' => 150],
            [['option_status', 'progress_type'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.org_prog_curr_option';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'option_code' => 'Option Code',
            'option_name' => 'Option Name',
            'prog_cur_id' => 'Prog Cur ID',
            'option_desc' => 'Option Desc',
            'option_status' => 'Option Status',
            'progress_type' => 'Progress Type',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCur()
    {
        return $this->hasOne(\app\models\OrgProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_cur_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgProgCurrOptionCourses()
    {
        return $this->hasMany(\app\models\OrgProgCurrOptionCourse::className(), ['option_id' => 'option_id']);
    }
    }
