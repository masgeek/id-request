<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_student_category".
 *
 * @property integer $std_category_id
 * @property string $std_category_name
 *
 * @property \app\models\SmRegRequiredDocument[] $smRegRequiredDocuments
 * @property \app\models\SmStudentProgrammeCurriculum[] $smStudentProgrammeCurriculums
 */
class SmStudentCategory extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smRegRequiredDocuments',
            'smStudentProgrammeCurriculums'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_category_id', 'std_category_name'], 'required'],
            [['std_category_id'], 'integer'],
            [['std_category_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_student_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_category_id' => 'Std Category ID',
            'std_category_name' => 'Std Category Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmRegRequiredDocuments()
    {
        return $this->hasMany(\app\models\SmRegRequiredDocument::className(), ['fk_category_id' => 'std_category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudentProgrammeCurriculums()
    {
        return $this->hasMany(\app\models\SmStudentProgrammeCurriculum::className(), ['student_category_id' => 'std_category_id']);
    }
    }
