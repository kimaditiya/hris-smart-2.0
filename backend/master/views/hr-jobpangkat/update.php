<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobpangkat */

$this->title = 'Update Hr Jobpangkat: ' . $model->pangkat_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobpangkats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pangkat_code, 'url' => ['view', 'id' => $model->pangkat_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-jobpangkat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
