<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_prog_curr_status".
 *
 * @property integer $student_prog_curr_stat_id
 * @property integer $student_programme_curriculum_id
 * @property integer $student_status_id
 */
class SmStudentProgCurrStatus extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            ''
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_prog_curr_stat_id', 'student_programme_curriculum_id', 'student_status_id'], 'required'],
            [['student_prog_curr_stat_id', 'student_programme_curriculum_id', 'student_status_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_prog_curr_status';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_prog_curr_stat_id' => 'Student Prog Curr Stat ID',
            'student_programme_curriculum_id' => 'Student Programme Curriculum ID',
            'student_status_id' => 'Student Status ID',
        ];
    }
}
