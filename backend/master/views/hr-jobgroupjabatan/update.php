<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgroupjabatan */

$this->title = 'Update Hr Jobgroupjabatan: ' . $model->groupjabatan_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobgroupjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->groupjabatan_code, 'url' => ['view', 'id' => $model->groupjabatan_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-jobgroupjabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
