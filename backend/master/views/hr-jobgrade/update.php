<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgrade */

$this->title = 'Update Hr Jobgrade: ' . $model->grade_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobgrades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grade_id, 'url' => ['view', 'id' => $model->grade_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-jobgrade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
