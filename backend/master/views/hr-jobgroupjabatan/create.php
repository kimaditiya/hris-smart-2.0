<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgroupjabatan */

$this->title = 'Create Hr Jobgroupjabatan';
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobgroupjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-jobgroupjabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
