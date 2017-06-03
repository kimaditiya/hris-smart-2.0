<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\sistem\models\RuleAuth */

$this->title = 'Create Rule Auth';
$this->params['breadcrumbs'][] = ['label' => 'Rule Auths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rule-auth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
