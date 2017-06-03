<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrRegion */

$this->title = 'Create Hr Region';
$this->params['breadcrumbs'][] = ['label' => 'Hr Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-region-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
