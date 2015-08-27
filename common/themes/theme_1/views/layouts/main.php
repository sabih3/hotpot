<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\themes\theme_1\CoreAsset;
use frontend\widgets\Alert;

$themeBaseUrl = $this->theme->baseUrl;
$themeRootDir = Yii::getAlias('@themeRootDir');

$this->title = 'Restaurant Homepage';

?>
<?php $this->beginPage() ?>
<?php CoreAsset::register($this); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
</head>

<body>
    <?php $this->beginBody() ?>
        <?php include($themeRootDir.'/theme_1/views/main-menu.php'); ?>
        <?php include($themeRootDir.'/theme_1/views/header.php'); ?>

            <?= $content; ?>

        <?php include($themeRootDir.'/theme_1/views/footer.php'); ?>

        
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
