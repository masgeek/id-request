<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_interfaculty_transfer_detail".
 *
 * @property integer $detail_id
 * @property string $academic_year
 * @property string $kcse_year
 * @property string $entry_year
 * @property string $start_date
 * @property string $end_date
 * @property string $process_date
 * @property string $display_date
 * @property string $student_notice
 */
class SmInterfacultyTransferDetail extends \yii\db\ActiveRecord
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
            [['detail_id', 'academic_year', 'kcse_year', 'start_date', 'end_date', 'process_date', 'display_date'], 'required'],
            [['detail_id'], 'integer'],
            [['kcse_year', 'entry_year'], 'number'],
            [['start_date', 'end_date', 'process_date', 'display_date'], 'safe'],
            [['academic_year'], 'string', 'max' => 20],
            [['student_notice'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_interfaculty_transfer_detail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'academic_year' => 'Academic Year',
            'kcse_year' => 'Kcse Year',
            'entry_year' => 'Entry Year',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'process_date' => 'Process Date',
            'display_date' => 'Display Date',
            'student_notice' => 'Student Notice',
        ];
    }
}
