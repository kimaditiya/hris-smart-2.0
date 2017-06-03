<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\sistem\models\HrEmployeelog */

$this->title = $model->employee_nik;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeelogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

/*view User Login*/
    $view_user = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ],
        [   //smartgroup_code
            'attribute' =>'smartgroup_code',
            'label'=>'Group Code',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //employee_nik
            'attribute' =>'employee_nik',
            'label'=>'NIK',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //nameEmploye
            'attribute' =>'employee_identifikasi',
            'label'=>'Nama Karyawan',
            'value'=>$model->nameEmploye,
            'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$data_employee,
                'options'=>['placeholder'=>'Select ...','id'=>'user-view-identifikasi'],
                'pluginOptions'=>['allowClear'=>true],
            ],
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //employe_pass
            'attribute' =>'employee_pass',
            'label'=>'Password',
            'type'=>DetailView::INPUT_PASSWORD,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
    ];
?>
<div class="hr-employeelog-view">

    <?= $detail_data_view=DetailView::widget([
        'id'=>'detail-data-user-login-view-id',
        'model' => $model,
        'attributes'=>$view_user,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_VIEW,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail User Login</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['delete','id'=>$model->log_id]),
        ],  
    ]) ?>

</div>
