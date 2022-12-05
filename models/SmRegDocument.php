<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_reg_documents".
 *
 * @property int $document_id
 * @property string $document_name
 * @property string $document_desc
 * @property bool $required
 */
class SmRegDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_reg_documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'document_name', 'document_desc'], 'required'],
            [['document_id'], 'default', 'value' => null],
            [['document_id'], 'integer'],
            [['required'], 'boolean'],
            [['document_name'], 'string', 'max' => 150],
            [['document_desc'], 'string', 'max' => 250],
            [['document_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
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
}
