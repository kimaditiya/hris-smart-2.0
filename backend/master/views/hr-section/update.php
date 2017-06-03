<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrSection */

$this->title = 'Update Hr Section: ' . $model->section_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->section_id, 'url' => ['view', 'id' => $model->section_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
