<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\master\models\HrEmployee;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\data\ActiveDataProvider;

// AppAsset::register($this);

if (Yii::$app->user->isGuest) { 

    /**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
 echo $this->render(
        'login_main',
        ['content' => $content]
    );

}else{

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav-md">
<?php $this->beginBody() ?>
<div class="container body">

    <div class="main_container">

    
     <?= $this->render(
            'header.php',
            ['directoryAsset' => $bundle]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $bundle]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $bundle]
        ) ?>

     </div>

        </div>


        




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<?php } ?>

