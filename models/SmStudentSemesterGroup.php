<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_semester_group".
 *
 * @property integer $student_semester_group_id
 * @property integer $prog_curriculum_semester_id
 * @property integer $student_semester_session_id
 * @property string $status
 *
 * @property \app\models\OrgProgCurrSemester $progCurriculumSemester
 */
class SmStudentSemesterGroup extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'progCurriculumSemester'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curriculum_semester_id', 'student_semester_session_id'], 'required'],
            [['prog_curriculum_semester_id', 'student_semester_session_id'], 'integer'],
            [['status'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_semester_group';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_semester_group_id' => 'Student Semester Group ID',
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'student_semester_session_id' => 'Student Semester Session ID',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemester()
    {
        return $this->hasOne(\app\models\OrgProgCurrSemester::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
    }
