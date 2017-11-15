<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?= Yii::$app->language ?>">
<!--<![endif]-->
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta charset="<?= Yii::$app->charset ?>">
    <title>Муми блог</title>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/frontend/web/images/favicon.png">
    <link rel="apple-touch-icon" href="/frontend/web/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/frontend/web/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/frontend/web/images/apple-touch-icon-114x114.png">
</head>
<body >
<?php $this->beginBody() ?>
<div class="se-pre-con"></div>
<div class="main">

    <?= $this->render('header.php') ?>

    <?= $content ?>

    <?= $this->render('footer.php') ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
