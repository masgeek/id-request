<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.ex_grading_system_detail".
 *
 * @property integer $grading_system_detail_id
 * @property integer $grading_system_id
 * @property double $lower_bound
 * @property double $upper_bound
 * @property string $grade
 * @property double $grade_point
 * @property string $is_active
 *
 * @property \app\models\ExGradingSystem $gradingSystem
 */
class ExGradingSystemDetail extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'gradingSystem'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grading_system_id', 'lower_bound', 'upper_bound', 'grade'], 'required'],
            [['grading_system_id'], 'integer'],
            [['lower_bound', 'upper_bound', 'grade_point'], 'number'],
            [['grade'], 'string', 'max' => 2],
            [['is_active'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.ex_grading_system_detail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grading_system_detail_id' => 'Grading System Detail ID',
            'grading_system_id' => 'Grading System ID',
            'lower_bound' => 'Lower Bound',
            'upper_bound' => 'Upper Bound',
            'grade' => 'Grade',
            'grade_point' => 'Grade Point',
            'is_active' => 'Is Active',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradingSystem()
    {
        return $this->hasOne(\app\models\ExGradingSystem::className(), ['grading_system_id' => 'grading_system_id']);
    }
    }
