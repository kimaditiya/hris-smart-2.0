<?php
use kartik\tree\TreeView;
use backend\sistem\models\Menu;
use kartik\tree\Module;


$this->title = 'Setting Menu';

echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => Menu::find()->addOrderBy('root, lft'), 
    'headingOptions' => ['label' => 'Categories'],
    // 'fontAwesome' => true,     // optional
    // 'isAdmin' => true,         // optional (toggle to enable admin mode)
    // 'displayValue' => 1,        // initial display value
    // 'softDelete' => true,       // defaults to true
      'nodeAddlViews' => [
        Module::VIEW_PART_2 => '@backend/sistem/views/menu/menu_part2'
    ],
    'cacheSettings' => [        
        'enableCache' => true   // defaults to true
    ]
]);
    