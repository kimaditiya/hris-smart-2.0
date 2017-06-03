<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranch */

$this->title = 'Update Hr Branch: ' . $model->branch_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->branch_id, 'url' => ['view', 'id' => $model->branch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-branch-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
