<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\sistem\models\Menu;

/* @var $this yii\web\View */
/* @var $searchModel backend\sistem\models\RuleAuthSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rule Auths';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="rule-auth-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rule Auth', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
