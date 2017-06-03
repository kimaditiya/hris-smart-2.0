<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDevision */

$this->title = 'Create Hr Devision';
$this->params['breadcrumbs'][] = ['label' => 'Hr Devisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-devision-create">

    <?= $this->render('_form', [
        'model' => $model,
        'data_direktorat'=>$data_direktorat
    ]) ?>

</div>
