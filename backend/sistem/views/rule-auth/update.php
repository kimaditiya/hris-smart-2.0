<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\sistem\models\RuleAuth */

$this->title = 'Update Rule Auth: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rule Auths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rule-auth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
