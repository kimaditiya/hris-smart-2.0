<?php
use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrGroup */

$this->title = 'Update Hr Group: ' . $model->smartgroup_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->smartgroup_code, 'url' => ['view', 'id' => $model->smartgroup_code]];
$this->params['breadcrumbs'][] = 'Update';


    /*edit group*/
    $edit_group = [
        [
            'group'=>true,
            'label'=>false,
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ],
         [   //smartgroup_code
            'attribute' =>'smartgroup_code',
            'label'=>'Kode Company',
            'displayOnly'=>true,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //smartgroup_name
            'attribute' =>'smartgroup_name',
            'label'=>'Name',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [   //smartgroup_shortname
            'attribute' =>'smartgroup_shortname',
            'label'=>'Short Name',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
         [   //smartgroup_url
            'attribute' =>'smartgroup_url',
            'label'=>'Link website',
            'type'=>DetailView::INPUT_TEXT,
            'labelColOptions' => ['style' => 'text-align:right;width: 15px']
        ],
        [
            'attribute'=>'smartgroup_tanda', 
            'label'=>'status',
            'format'=>'raw',
            'value'=>$model->smartgroup_tanda != 3 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">InActive</span>',
             'type'=>DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                'data'=>$valStt,
                'options'=>['placeholder'=>'Select ...','id'=>'edit-group-smartgroup_tanda-id'],
                'pluginOptions'=>['allowClear'=>true],
            ], 
            'valueColOptions'=>['style'=>'width:30%']
        ],
    ];

     /*Detail data View Editing*/
    $detail_data_view=DetailView::widget([
        'id'=>'detail-data-group-edit-id',
        'model' => $model,
        'attributes'=>$edit_group,
        'condensed'=>true,
        'hover'=>true,
        'mode'=>DetailView::MODE_EDIT,
        // 'buttons1'=>'{update}',
        // 'buttons2'=>'{view}{save}',
        'panel'=>[
                    'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b> Detail Group</b></h6></div>',
                    'type'=>DetailView::TYPE_INFO,
                ],
         'deleteOptions'=>[
                'url'=>Url::toRoute(['delete','id'=>$model->smartgroup_code]),
        ],  
    ]);
?>
<div class="hr-group-update">

<?= $detail_data_view ?>
</div>
