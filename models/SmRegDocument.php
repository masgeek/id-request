<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_reg_documents".
 *
 * @property integer $document_id
 * @property string $document_name
 * @property string $document_desc
 * @property boolean $required
 *
 * @property \app\models\SmRegRequiredDocument[] $smRegRequiredDocuments
 */
class SmRegDocument extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'smRegRequiredDocuments'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'document_name', 'document_desc'], 'required'],
            [['document_id'], 'integer'],
            [['required'], 'boolean'],
            [['document_name'], 'string', 'max' => 150],
            [['document_desc'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_reg_documents';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'Document ID',
            'document_name' => 'Document Name',
            'document_desc' => 'Document Desc',
            'required' => 'Required',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmRegRequiredDocuments()
    {
        return $this->hasMany(\app\models\SmRegRequiredDocument::className(), ['fk_document_id' => 'document_id']);
    }
    }
