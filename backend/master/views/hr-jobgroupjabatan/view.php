<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrJobgroupjabatan */

$this->title = $model->groupjabatan_code;
$this->params['breadcrumbs'][] = ['label' => 'Hr Jobgroupjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-jobgroupjabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->groupjabatan_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->groupjabatan_code], [
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
            'groupjabatan_code',
            'groupjabatan_name',
            'groupjabatan_tanda',
        ],
    ]) ?>

</div>
