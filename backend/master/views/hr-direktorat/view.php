<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDirektorat */

$this->title = $model->direktorat_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Direktorats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data direktorat_tanda
  function Status($model){
      if ($model->direktorat_tanda == 1 || $model->direktorat_tanda == 2){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->direktorat_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }

?>
<div class="hr-direktorat-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'direktorat_id',
            'nameBranch',
            'direktorat_name',
            [
                'label'=>'status',
                'format'=>'raw',
                'value'=>function($model){
                        return status($model);
                },
                
            ],
            // 'direktorat_tanda',
        ],
    ]) ?>

</div>
