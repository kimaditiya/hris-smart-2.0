<?php
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHomebase */

$this->title = 'Update Hr Homebase: ' . $model->homebase_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Homebases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->homebase_id, 'url' => ['view', 'id' => $model->homebase_id]];
$this->params['breadcrumbs'][] = 'Update';

 /*edit homebase*/
    $edit_homebase = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ],
         [   //homebase_id
            'attribute' =>'homebase_id',
            'label'=>'ID',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //homebase_code
            'attribute' =>'homebase_code',
            'label'=>'Homebase Code',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //nameCompany
            'attribute' =>'nameCompany',
            'label'=>'Company Name',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //homebase_name
            'attribute' =>'homebase_name',
            'label'=>'Name Homebase',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [
            'attribute'=>'homebase_tanda', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->homebase_tanda != 3 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">InActive</span>',
             'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$valStt,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-group-homebase_tanda-id'],
                'pluginOptions'=>['allowClear'=>true],
            ], 
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ];

     /*Detail data View Editing*/
    $detail_data_view=DetailView::widget([
        'id'=>'detail-data-homebase-edit-id',
        'model' => $model,
        'attributes'=>$edit_homebase,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Homebase</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['delete','id'=>$model->homebase_id]),
        ],  
    ]);
?>
<div class="hr-homebase-update">

   <?= $detail_data_view ?>

</div>
