<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\controllers\UserBookController;

AppAsset::register($this);

// CSS CUSTOM 
$this->registerCssFile("@web/css/library.css");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo Url::to('/book') ?>">Biblioteca</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav navbar-left">
                <?php if (!Yii::$app->user->isGuest) {
                if (Yii::$app->user->identity->level == 1) {
                } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo Url::to('/userbook') ?>">Mis Reservas</a>
                    </li>
                <?php }
                }
                ?> 
            </ul>

            <ul class="navbar-nav navbar-right">
                <?php if (!Yii::$app->user->isGuest) { ?>
                    <li class="nav-item active">
                        <?= Html::a('Cerrar Sesion', Url::to(['/site/logout']), ['class' => 'nav-link', 'data-method' => 'POST']) ?>
                        <!-- <a class="nav-link" href="<?php echo Url::to('/site/logout') ?>">Cerrar Sesión</a> -->
                    </li>
                <?php } else {?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo Url::to('/site/login') ?>">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo Url::to('/site/signup') ?>">Registrar</a>
                    </li>
                <?php } ?> 
            </ul>
        </div>
    </nav>




<!-- CONTENT -->
<!-- <div class="wrap"> -->
    <div class="container">
        <?= $content ?>
    </div>
<!-- </div> -->

<?php $this->endBody() ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>