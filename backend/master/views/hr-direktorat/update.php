<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDirektorat */

$this->title = 'Update Hr Direktorat: ' . $model->direktorat_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Direktorats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->direktorat_id, 'url' => ['view', 'id' => $model->direktorat_id]];
$this->params['breadcrumbs'][] = 'Update';

    /*edit direktorat*/
    $edit_direktorat = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ],
         [   //direktorat_id
            'attribute' =>'direktorat_id',
            'label'=>'ID',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //branch_code
            'attribute' =>'branch_code',
            'label'=>'kode Branch',
            'value'=>$model->nameBranch,
            'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$data_branch,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-direktorat-branch_code-id'],
                'pluginOptions'=>['allowClear'=>true],
            ], 
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //direktorat_name
            'attribute' =>'direktorat_name',
            'label'=>'Direktorat Name',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [
            'attribute'=>'direktorat_tanda', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->direktorat_tanda != 3 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">InActive</span>',
             'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$valStt,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-direktorat-direktorat_tanda-id'],
                'pluginOptions'=>['allowClear'=>true],
            ], 
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ];

     /*Detail data View Editing*/
    $detail_data_view=DetailView::widget([
        'id'=>'detail-data-direktorat-edit-id',
        'model' => $model,
        'attributes'=>$edit_direktorat,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Direktorat</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['delete','id'=>$model->direktorat_id]),
        ],  
    ]);

?>
<div class="hr-direktorat-update">

   <?= $detail_data_view ?>

</div>
