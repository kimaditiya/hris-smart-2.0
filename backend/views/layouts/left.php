
<?php
use mdm\admin\components\MenuHelper;
use yii\helpers\Html;

if(Yii::$app->ambilprofile->GetProfile()){
    if(!Yii::$app->ambilprofile->GetProfile()->employee_foto){
        $image_profile = '@web/image/img_default_male.jpg';
    }else{
        $image_check = '@web/image/'.Yii::$app->ambilprofile->GetProfile()->employee_foto;
        if(file_exists($image_check)){
            $image_profile = $image_check;
        }else{
             $image_profile = '@web/image/img_default_male.jpg';
        }  
    }
}else{
     $image_profile = '@web/image/img_default_male.jpg';
}

?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img($image_profile,['class' => 'img-circle','alt'=>'User Image']);  ?> 
            </div>
            <div class="pull-left info">
                <p> <?= Yii::$app->ambilprofile->GetProfile() != 'none' ? Yii::$app->ambilprofile->GetProfile()->employee_name : 'None' ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

         <?php
         // $callback = function($menu){

       
         //        // $data = $menu['data'];
         //        return [
         //            'label' => $menu['name'],
         //            'url' => [$menu['route']],
         //            // 'options' => [$data],
         //            // 'icon' => $data,
         //            'items' => $menu['children'],
         //        ];
         //    };
    // $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback, true);

       

    ?>
        <?= dmstr\widgets\Menu::widget([
           'options' => ['class' => 'sidebar-menu'],
           'encodeLabels' => false,
           'items' =>Yii::$app->ambilmenu->getMenu(Yii::$app->user->id)
        ]);
        ?>

  

    </section>

</aside>