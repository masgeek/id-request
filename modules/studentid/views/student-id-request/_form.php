<?php

use app\models\SmIdRequestType;
use kartik\form\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentIdRequest */
/* @var $form kartik\form\ActiveForm */

?>

<div class="student-id-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'request_id')->textInput(['placeholder' => 'Request']) ?>

    <?= $form->field($model, 'request_type_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(SmIdRequestType::find()->orderBy('request_type_id')->asArray()->all(), 'request_type_id', 'id_type_desc'),
        'options' => ['placeholder' => 'Choose Sm id request type'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'student_prog_curr_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\SmStudentProgrammeCurriculum::find()->orderBy('student_prog_curriculum_id')->asArray()->all(), 'student_prog_curriculum_id', 'student_prog_curriculum_id'),
        'options' => ['placeholder' => 'Choose Sm student programme curriculum'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'request_date')->textInput(['placeholder' => 'Request Date']) ?>

    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\SmIdRequestStatus::find()->orderBy('status_id')->asArray()->all(), 'status_id', 'status_id'),
        'options' => ['placeholder' => 'Choose Sm id request status'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true, 'placeholder' => 'Source']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
