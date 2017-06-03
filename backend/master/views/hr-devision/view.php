<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\master\models\HrDevision */

$this->title = $model->devision_id;
$this->params['breadcrumbs'][] = ['label' => 'Hr Devisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hr-devision-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->devision_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->devision_id], [
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
            'devision_id',
            'direktorat_id',
            'smartgroup_code',
            'devision_name',
            'devision_tanda',
        ],
    ]) ?>

</div>
