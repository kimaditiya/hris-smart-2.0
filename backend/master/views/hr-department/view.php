<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDepartment */

$this->title = $model->department_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

#status data department_tanda
  function Status($model) : string {
      if ($model->department_tanda == 1 || $model->department_tanda == 2){
            return html::label('<span class="fa fa-check fa-1x"></span>','',['style'=>['color'=>'green']]);
        }else if($model->department_tanda == 3){
            return html::label('<span class="fa fa-times fa-1x"></span>','',['style'=>['color'=>'red']]);
       }
  }
?>
<div class="hr-department-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'department_id',
            [
              'label'=>'Company',
              'attribute'=>'nameCompany'
            ],
            [
              'label'=>'Direktorat',
              'attribute'=>'namedirektorat'
            ],
            [
              'label'=>'Divisi',
              'attribute'=>'nameDivisi'
            ],
            'department_name',
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
