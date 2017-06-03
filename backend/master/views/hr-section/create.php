<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrSection */

$this->title = 'Create Hr Section';
$this->params['breadcrumbs'][] = ['label' => 'Hr Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-section-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_department'=>$data_department
    ]) ?>

</div>
