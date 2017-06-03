<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobcategory */

$this->title = 'Create Hr Jobcategory';
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-jobcategory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
