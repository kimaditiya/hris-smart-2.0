<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;


Modal::begin([    
         'id' => 'modal-branch',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Branch').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentbranch'></div>";
     Modal::end();


 Modal::begin([    
         'id' => 'modal-branch-view',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Branch').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();

Modal::begin([    
         'id' => 'modal-branch-update',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Update Branch').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();