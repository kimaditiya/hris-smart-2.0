<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;


Modal::begin([    
         'id' => 'modal-homebase',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Homebase').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContenthomebase'></div>";
     Modal::end();


 Modal::begin([    
         'id' => 'modal-hr-homebase-view',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Homebase').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();


 Modal::begin([    
         'id' => 'modal-homebase-view-after',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Homebase').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);
      echo "<div id='modalContenthomebaseviewafter'></div>";    
     Modal::end();


Modal::begin([    
         'id' => 'modal-hr-homebase-update',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Update Homebase').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();