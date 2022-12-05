<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_reg_required_document".
 *
 * @property integer $required_document_id
 * @property integer $fk_document_id
 * @property integer $fk_category_id
 *
 * @property \app\models\SmRegDocument $fkDocument
 * @property \app\models\SmStudentCategory $fkCategory
 * @property \app\models\SmStudSubmittedDocument[] $smStudSubmittedDocuments
 */
class SmRegRequiredDocument extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'fkDocument',
            'fkCategory',
            'smStudSubmittedDocuments'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fk_document_id', 'fk_category_id'], 'required'],
            [['fk_document_id', 'fk_category_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_reg_required_document';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'required_document_id' => 'Required Document ID',
            'fk_document_id' => 'Fk Document ID',
            'fk_category_id' => 'Fk Category ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkDocument()
    {
        return $this->hasOne(\app\models\SmRegDocument::className(), ['document_id' => 'fk_document_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkCategory()
    {
        return $this->hasOne(\app\models\SmStudentCategory::className(), ['std_category_id' => 'fk_category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmStudSubmittedDocuments()
    {
        return $this->hasMany(\app\models\SmStudSubmittedDocument::className(), ['required_document_id' => 'required_document_id']);
    }
    }
