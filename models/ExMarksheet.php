<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.ex_marksheet".
 *
 * @property integer $marksheet_id
 * @property integer $student_course_reg_id
 * @property double $course_work_mark
 * @property double $exam_mark
 * @property integer $final_mark
 *
 * @property \app\models\CrCourseRegistration $studentCourseReg
 */
class ExMarksheet extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'studentCourseReg'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marksheet_id', 'student_course_reg_id'], 'required'],
            [['marksheet_id', 'student_course_reg_id', 'final_mark'], 'integer'],
            [['course_work_mark', 'exam_mark'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.ex_marksheet';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'marksheet_id' => 'Marksheet ID',
            'student_course_reg_id' => 'Student Course Reg ID',
            'course_work_mark' => 'Course Work Mark',
            'exam_mark' => 'Exam Mark',
            'final_mark' => 'Final Mark',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourseReg()
    {
        return $this->hasOne(\app\models\CrCourseRegistration::className(), ['student_course_reg_id' => 'student_course_reg_id']);
    }
    }
