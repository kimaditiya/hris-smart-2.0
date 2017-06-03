<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrGroup */

$this->title = 'Create Hr Group';
$this->params['breadcrumbs'][] = ['label' => 'Hr Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-group-create">


    <?= $this->render('_form', [
        'model' => $model,
        'kd_group'=>$kd_group
    ]) ?>

</div>
