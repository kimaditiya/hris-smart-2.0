<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\master\models\HrEmployeeeducation */

$this->title = 'Create Hr Employeeeducation';
$this->params['breadcrumbs'][] = ['label' => 'Hr Employeeeducations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-employeeeducation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
