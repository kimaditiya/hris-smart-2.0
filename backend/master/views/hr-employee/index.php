<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

$this->title = 'Hr Employee';

$list_employee = $this->render('list_employee', ['dataProvider' => $dataProvider,'searchModel'=>$searchModel]);

$list_salary = $this->render('salary');

  $items = [
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> List Employee',
        'content'=>$list_employee, // content employee
        'active'=>true
    ],
    [
        'label'=>'<i class="fa fa-money"></i> Salary',
        'content'=>$list_salary, // content  salary
        // 'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
    ],
];

// Above
$tabs =  TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);

?>
<div class="hr-direktorat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $tabs ?>
</div>