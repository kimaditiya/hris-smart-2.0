<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrHomebase */

$this->title = $model->homebase_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Homebases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data homebase_tanda
  function Status($model){
      if ($model->homebase_tanda == 1 || $model->homebase_tanda == 2){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->homebase_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }
?>
<div class="hr-homebase-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'homebase_id',
            'nameCompany',
            'homebase_code',
            'homebase_name',
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
