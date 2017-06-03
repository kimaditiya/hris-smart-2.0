<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobpangkat */

$this->title = $model->pangkat_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobpangkats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-jobpangkat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pangkat_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pangkat_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category_code',
            'pangkat_code',
            'pangkat_name',
            'pangkat_tanda',
        ],
    ]) ?>

</div>
