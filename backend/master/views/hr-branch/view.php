<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranch */

$this->title = $model->branch_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data branch_tanda
  function Status($model) : string {
      if ($model->branch_tanda == 1 || $model->branch_tanda == 2){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->branch_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }

?>
<div class="hr-branch-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'branch_id',
            [   
                'label'=>'Region',
                'attribute'=>'nameRegion'
            ],
            [   
                'label'=>'Company',
                'attribute'=>'nameCompany'
            ],
            'branch_code',
            'branch_name',
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
