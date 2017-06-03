<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobjabatan */

$this->title = 'Update Hr Jobjabatan: ' . $model->jabatan_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jabatan_code, 'url' => ['view', 'id' => $model->jabatan_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-jobjabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
