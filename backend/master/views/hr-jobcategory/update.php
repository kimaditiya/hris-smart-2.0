<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobcategory */

$this->title = 'Update Hr Jobcategory: ' . $model->category_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_code, 'url' => ['view', 'id' => $model->category_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hr-jobcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
