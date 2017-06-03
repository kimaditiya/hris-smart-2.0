<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrRegion */

$this->title = $model->region_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data region_tanda
  function Status($model){
      if ($model->region_tanda == 1 || $model->region_tanda == 2 ){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->region_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }
?>
<div class="hr-region-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'region_code',
            'companyName',
            'region_name',
               [
                'label'=>'status',
                'format'=>'raw',
                'value'=>function($model){
                        return status($model);
                },
                
            ],
        ],
    ]) ?>

</div>
