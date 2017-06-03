<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrGroup */

$this->title = $model->smartgroup_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data smartgroup_tanda
  function Status($model){
      if ($model->smartgroup_tanda == 1 || $model->smartgroup_tanda == 2){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->smartgroup_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }
  
?>
<div class="hr-group-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'smartgroup_code',
            'smartgroup_name',
            'smartgroup_shortname',
            'smartgroup_url:url',
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
