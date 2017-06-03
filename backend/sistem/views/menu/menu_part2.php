
<?php

use yii\helpers\ArrayHelper;
use kartik\widgets\Typeahead;


/**
    *@author wawan <aditiyakurniawan30@gmail.com>
    *@since 1.0
    * extra inputan treeview
**/

$data_route = (new \yii\db\Query())
    ->select('*')
    ->from('auth_item')
    ->where(['type' => 2])
    ->all();

$route = ArrayHelper::getColumn($data_route, 'name');

?>


<?= $form->field($node,'route')->widget(Typeahead::classname(), [
    'options' => ['placeholder' => 'Filter as you Route ...'],
    'pluginOptions' => ['highlight'=>true],
    'dataset' => [
        [
            'local' => $route,
            'limit' => 5
        ]
    ]
]) ?>

<?= $form->field($node, 'icon_menu_utama')->textInput(['maxlength' => true]) ?>