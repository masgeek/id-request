<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.sm_reg_required_document".
 *
 * @property int $required_document_id
 * @property int $fk_document_id
 * @property int $fk_category_id
 */
class SmRegRequiredDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.sm_reg_required_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_document_id', 'fk_category_id'], 'required'],
            [['fk_document_id', 'fk_category_id'], 'default', 'value' => null],
            [['fk_document_id', 'fk_category_id'], 'integer'],
            [['fk_document_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmRegDocument::class, 'targetAttribute' => ['fk_document_id' => 'document_id']],
            [['fk_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SmStudentCategory::class, 'targetAttribute' => ['fk_category_id' => 'std_category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'required_document_id' => 'Required Document ID',
            'fk_document_id' => 'Fk Document ID',
            'fk_category_id' => 'Fk Category ID',
        ];
    }
}
