<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentId */

$this->title = 'Update Student Id: ' . ' ' . $model->student_id_serial_no;
$this->params['breadcrumbs'][] = ['label' => 'Student Id', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id_serial_no, 'url' => ['view', 'id' => $model->student_id_serial_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-id-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
