<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.cr_course_category".
 *
 * @property integer $category_id
 * @property string $category_name
 *
 * @property \app\models\FsProgCourseFeeStructure[] $fsProgCourseFeeStructures
 * @property \app\models\OrgCourse[] $orgCourses
 */
class CrCourseCategory extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fsProgCourseFeeStructures',
            'orgCourses'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'category_name'], 'required'],
            [['category_id'], 'integer'],
            [['category_name'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.cr_course_category';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCourseFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgCourseFeeStructure::className(), ['course_category_id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgCourses()
    {
        return $this->hasMany(\app\models\OrgCourse::className(), ['category_id' => 'category_id']);
    }
    }
