<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeeducation */

$this->title = 'Update Hr Employeeeducation: ' . $model->education_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeeeducations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->education_id, 'url' => ['view', 'id' => $model->education_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-employeeeducation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
