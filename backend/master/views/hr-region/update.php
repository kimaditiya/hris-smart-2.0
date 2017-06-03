<?php
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrRegion */

$this->title = 'Update Hr Region: ' . $model->region_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->region_code, 'url' => ['view', 'id' => $model->region_code]];
$this->params['breadcrumbs'][] = 'Update';

 /*edit region*/
    $edit_region = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ],
        [   //region_code
            'attribute' =>'region_code',
            'label'=>'Region Code',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //companyName
            'attribute' =>'companyName',
            'label'=>'Company',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         
         [   //region_name
            'attribute' =>'region_name',
            'label'=>'Name',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [
            'attribute'=>'region_tanda', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->region_tanda != 3 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">InActive</span>',
             'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$valStt,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-region-region_tanda-id'],
                'pluginOptions'=>['allowClear'=>true],
            ], 
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ];

     /*Detail data View Editing*/
    $detail_data_view=DetailView::widget([
        'id'=>'detail-data-region-edit-id',
        'model' => $model,
        'attributes'=>$edit_region,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Region</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['delete','id'=>$model->region_code]),
        ],  
    ]);
?>
<div class="hr-region-update">
	<?= $detail_data_view ?>
</div>
