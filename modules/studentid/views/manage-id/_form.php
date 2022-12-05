<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentId */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SmStudentIdDetails', 
        'relID' => 'sm-student-id-details', 
        'value' => \yii\helpers\Json::encode($model->smStudentIdDetails),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'SmStudentIdStatus', 
        'relID' => 'sm-student-id-status', 
        'value' => \yii\helpers\Json::encode($model->smStudentIdStatuses),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="student-id-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'student_id_serial_no')->textInput(['placeholder' => 'Student Id Serial No']) ?>

    <?= $form->field($model, 'student_prog_curr_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\modules\studentid\models\SmStudentProgrammeCurriculum::find()->orderBy('student_prog_curriculum_id')->asArray()->all(), 'student_prog_curriculum_id', 'student_prog_curriculum_id'),
        'options' => ['placeholder' => 'Choose Sm student programme curriculum'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'issuance_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Issuance Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'valid_from')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Valid From',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'valid_to')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Valid To',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'barcode')->textInput(['placeholder' => 'Barcode']) ?>

    <?= $form->field($model, 'id_status')->textInput(['maxlength' => true, 'placeholder' => 'Id Status']) ?>

    <?= $form->field($model, 'request_id')->textInput(['placeholder' => 'Request']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('SmStudentIdDetails'),
            'content' => $this->render('_formSmStudentIdDetails', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->smStudentIdDetails),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('SmStudentIdStatus'),
            'content' => $this->render('_formSmStudentIdStatus', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->smStudentIdStatuses),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
