<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_sm_student_fee_structure".
 *
 * @property integer $student_fee_structure_id
 * @property integer $student_prog_curr_id
 * @property integer $fee_structure_type_id
 * @property string $effective_date
 *
 * @property \app\models\FsFeesStructureType $feeStructureType
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurr
 */
class SmSmStudentFeeStructure extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'feeStructureType',
            'studentProgCurr'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_fee_structure_id', 'student_prog_curr_id', 'fee_structure_type_id'], 'required'],
            [['student_fee_structure_id', 'student_prog_curr_id', 'fee_structure_type_id'], 'integer'],
            [['effective_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_sm_student_fee_structure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_fee_structure_id' => 'Student Fee Structure ID',
            'student_prog_curr_id' => 'Student Prog Curr ID',
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'effective_date' => 'Effective Date',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeStructureType()
    {
        return $this->hasOne(\app\models\FsFeesStructureType::className(), ['fee_structure_type_id' => 'fee_structure_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurr()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curr_id']);
    }
    }
