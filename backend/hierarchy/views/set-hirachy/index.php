<?php
use kartik\tree\TreeView;
use backend\master\models\HrGroupHirachy;
use kartik\tree\Module;


$this->title = 'Setting Hirachy';


echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => HrGroupHirachy::find()->addOrderBy('root, lft'), 
    'headingOptions' => ['label' => 'Hirachy'],
    // 'fontAwesome' => true,     // optional
    // 'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    // 'softDelete' => true,       // defaults to true
    'cacheSettings' => [        
        'enableCache' => false   // defaults to true
    ]
]);

?>







    