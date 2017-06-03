<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrBranch */

$this->title = 'Create Hr Branch';
$this->params['breadcrumbs'][] = ['label' => 'Hr Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-branch-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_region'=>$data_region
    ]) ?>

</div>
