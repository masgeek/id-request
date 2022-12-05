<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.fs_prog_curr_fees_structure".
 *
 * @property integer $prog_curr_fee_structure_id
 * @property integer $fee_structure_type_id
 * @property integer $academic_session_id
 * @property integer $academic_level_id
 *
 * @property \app\models\FsProgAdministrativeFeeStructure[] $fsProgAdministrativeFeeStructures
 * @property \app\models\FsProgCourseFeeStructure[] $fsProgCourseFeeStructures
 * @property \app\models\FsFeesStructureType $feeStructureType
 * @property \app\models\OrgAcademicLevel $academicLevel
 * @property \app\models\OrgAcademicSession $academicSession
 */
class FsProgCurrFeesStructure extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fsProgAdministrativeFeeStructures',
            'fsProgCourseFeeStructures',
            'feeStructureType',
            'academicLevel',
            'academicSession'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prog_curr_fee_structure_id', 'fee_structure_type_id', 'academic_session_id'], 'required'],
            [['prog_curr_fee_structure_id', 'fee_structure_type_id', 'academic_session_id', 'academic_level_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.fs_prog_curr_fees_structure';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prog_curr_fee_structure_id' => 'Prog Curr Fee Structure ID',
            'fee_structure_type_id' => 'Fee Structure Type ID',
            'academic_session_id' => 'Academic Session ID',
            'academic_level_id' => 'Academic Level ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgAdministrativeFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgAdministrativeFeeStructure::className(), ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFsProgCourseFeeStructures()
    {
        return $this->hasMany(\app\models\FsProgCourseFeeStructure::className(), ['prog_curr_fee_structure_id' => 'prog_curr_fee_structure_id']);
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
    public function getAcademicLevel()
    {
        return $this->hasOne(\app\models\OrgAcademicLevel::className(), ['academic_level_id' => 'academic_level_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicSession()
    {
        return $this->hasOne(\app\models\OrgAcademicSession::className(), ['acad_session_id' => 'academic_session_id']);
    }
    }
