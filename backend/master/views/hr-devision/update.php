<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDevision */

$this->title = 'Update Hr Devision: ' . $model->devision_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Devisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->devision_id, 'url' => ['view', 'id' => $model->devision_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-devision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
