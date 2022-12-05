<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\studentid\models\StudentId */

$this->title = 'Create Student Id';
$this->params['breadcrumbs'][] = ['label' => 'Student Id', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-id-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
