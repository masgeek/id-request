<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_status".
 *
 * @property integer $status_id
 * @property string $status
 * @property boolean $current_status
 *
 * @property \app\models\SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmStudentStatus extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smStudentProgrammeCurriculums'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'status', 'current_status'], 'required'],
            [['status_id'], 'integer'],
            [['current_status'], 'boolean'],
            [['status'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status' => 'Status',
            'current_status' => 'Current Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\SmStudentProgrammeCurriculum::className(), ['status_id' => 'status_id']);
    }
    }
