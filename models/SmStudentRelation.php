<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_relations".
 *
 * @property integer $stud_rel_id
 * @property string $student_rel_name
 * @property integer $rel_type
 * @property string $tel_no
 * @property string $tel_no2
 * @property string $email_addr
 * @property boolean $mentor_status
 * @property string $record_status
 * @property integer $student_prog_curriculum_id
 *
 * @property \app\models\SmStudRelType $relType
 * @property \app\models\SmStudentProgrammeCurriculum $studentProgCurriculum
 */
class SmStudentRelation extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'relType',
            'studentProgCurriculum'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stud_rel_id', 'student_rel_name'], 'required'],
            [['stud_rel_id', 'rel_type', 'student_prog_curriculum_id'], 'integer'],
            [['tel_no', 'tel_no2', 'email_addr', 'record_status'], 'string'],
            [['mentor_status'], 'boolean'],
            [['student_rel_name'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_relations';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stud_rel_id' => 'Stud Rel ID',
            'student_rel_name' => 'Student Rel Name',
            'rel_type' => 'Rel Type',
            'tel_no' => 'Tel No',
            'tel_no2' => 'Tel No2',
            'email_addr' => 'Email Addr',
            'mentor_status' => 'Mentor Status',
            'record_status' => 'Active, innactive, invalid',
            'student_prog_curriculum_id' => 'Student Prog Curriculum ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelType()
    {
        return $this->hasOne(\app\models\SmStudRelType::className(), ['stud_rel_type_id' => 'rel_type']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentProgCurriculum()
    {
        return $this->hasOne(\app\models\SmStudentProgrammeCurriculum::className(), ['student_prog_curriculum_id' => 'student_prog_curriculum_id']);
    }
    }
