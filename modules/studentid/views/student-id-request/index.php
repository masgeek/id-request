<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\studentid\models\StudentIdRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\SmIdRequestStatus;
use app\models\SmIdRequestType;
use app\models\SmStudentProgrammeCurriculum;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Student Id Requests';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="student-id-request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student Id Request', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        'request_id',
        [
                'attribute' => 'request_type_id',
                'label' => 'Request Type',
                'value' => function($model){                   
                    return $model->requestType->request_type_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(SmIdRequestType::find()->asArray()->all(), 'request_type_id', 'request_type_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Sm id request type', 'id' => 'grid-student-id-request-search-request_type_id']
            ],
        [
                'attribute' => 'student_prog_curr_id',
                'label' => 'Student Prog Curr',
                'value' => function($model){                   
                    return $model->studentProgCurr->student_prog_curriculum_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(SmStudentProgrammeCurriculum::find()->asArray()->all(), 'student_prog_curriculum_id', 'student_prog_curriculum_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Sm student programme curriculum', 'id' => 'grid-student-id-request-search-student_prog_curr_id']
            ],
        'request_date',
        [
                'attribute' => 'status_id',
                'label' => 'Status',
                'value' => function($model){                   
                    return $model->status->status_id;                   
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
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-student-id-request']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
