<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\studentid\models\StudentIdRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tab int */

/* @var $title string */

use app\models\SmIdRequestStatus;
use app\models\SmIdRequestType;
use app\models\SmStudentProgrammeCurriculum;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

?>

<?php
$gridColumn = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'request_type_id',
        'value' => function ($model) {
            /* @var $model app\modules\studentid\models\StudentIdRequest */
            return $model->requestType->id_type_desc;
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(SmIdRequestType::find()->asArray()->all(), 'request_type_id', 'id_type_desc'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Sm id request type', 'id' => 'grid-student-id-request-search-request_type_id']
    ],
    [
        'attribute' => 'student_prog_curr_id',
        'value' => function ($model) {
            /* @var $model app\modules\studentid\models\StudentIdRequest */
            return $model->studentProgCurr->progCurriculum->prog_curriculum_desc;
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(SmStudentProgrammeCurriculum::find()->asArray()->all(), 'student_prog_curriculum_id', 'student_prog_curriculum_id'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Sm student programme curriculum', 'id' => 'grid-student-id-request-search-student_prog_curr_id']
    ],
    'request_date:Date',
    [
        'attribute' => 'status_id',
        'value' => function ($model) {
            /* @var $model app\modules\studentid\models\StudentIdRequest */
            return $model->status->status_name;
        },
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(SmIdRequestStatus::find()->asArray()->all(), 'status_id', 'status_id'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Sm id request status', 'id' => 'grid-student-id-request-search-status_id']
    ],
    'source',
    [
        'class' => 'yii\grid\ActionColumn',
    ],
];
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-student-id-request' . $tab]],
    'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . $title,
    ],
    'export' => false,
]); ?>
