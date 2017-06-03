<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;


Modal::begin([    
         'id' => 'modal-region',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-plus"></div><div><h4 class="modal-title">'.Html::encode('Create Region').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
    echo "<div id='modalContentregion'></div>";
     Modal::end();



 Modal::begin([    
         'id' => 'modal-region-view',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-eye"></div><div><h4 class="modal-title">'.Html::encode('View Region').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();

Modal::begin([    
         'id' => 'modal-region-update',   
         'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa fa-edit"></div><div><h4 class="modal-title">'.Html::encode('Update Region').'</h4></div>', 
     // 'size' => Modal::SIZE_, 
         'headerOptions'=>[   
                 'style'=> 'border-radius:5px; background-color: rgba(90, 171, 255, 0.7)',    
         ],   
     ]);    
     Modal::end();


Modal::begin([
      'id' => 'confirm-permission-alert-region',
      'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/image/warning.jpg',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Info Warning !</b></h4></div>',
      'size' => Modal::SIZE_SMALL,
      'headerOptions'=>[
        'style'=> 'border-radius:5px; background-color:rgba(142, 202, 223, 0.9)'
      ],
    ]);
    echo "<div> your not permission !.
        <dl>
        </dl>
      </div>";
  Modal::end();