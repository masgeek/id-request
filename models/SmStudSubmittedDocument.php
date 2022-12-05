<?php

namespace app\models;

use Yii;

/**
 * This is the base model class for table "smis.sm_stud_submitted_document".
 *
 * @property integer $student_document_id
 * @property integer $required_document_id
 * @property string $document_path
 * @property string $ip_address
 * @property string $upload_date
 * @property string $verify_status
 * @property string $doc_comments
 * @property integer $adm_refno
 *
 * @property \app\models\SmAdmittedStudent $admRefno
 * @property \app\models\SmRegRequiredDocument $requiredDocument
 */
class SmStudSubmittedDocument extends \yii\db\ActiveRecord
{
    //use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    /*public function relationNames()
    {
        return [
            'admRefno',
            'requiredDocument'
        ];
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['required_document_id', 'document_path', 'upload_date', 'verify_status', 'adm_refno'], 'required'],
            [['required_document_id', 'adm_refno'], 'integer'],
            [['upload_date'], 'safe'],
            [['document_path', 'doc_comments'], 'string', 'max' => 100],
            [['ip_address'], 'string', 'max' => 60],
            [['verify_status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smis.sm_stud_submitted_document';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_document_id' => 'Student Document ID',
            'required_document_id' => 'Required Document ID',
            'document_path' => 'Document Path',
            'ip_address' => 'Ip Address',
            'upload_date' => 'Upload Date',
            'verify_status' => 'Verify Status',
            'doc_comments' => 'Doc Comments',
            'adm_refno' => 'Adm Refno',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmRefno()
    {
        return $this->hasOne(\app\models\SmAdmittedStudent::className(), ['adm_refno' => 'adm_refno']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequiredDocument()
    {
        return $this->hasOne(\app\models\SmRegRequiredDocument::className(), ['required_document_id' => 'required_document_id']);
    }
    }
