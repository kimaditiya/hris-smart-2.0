<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDirektorat */

$this->title = 'Create Hr Direktorat';
$this->params['breadcrumbs'][] = ['label' => 'Hr Direktorats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-direktorat-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_branch'=>$data_branch
    ]) ?>

</div>
