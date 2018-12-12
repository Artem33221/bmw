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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
        if(Yii::$app->urlManager->parseRequest(Yii::$app->request)[0] != 'site/login' && Yii::$app->urlManager->parseRequest(Yii::$app->request)[0] != 'site/register'){

            echo '
<header  class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							89166102649
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							shop@bmw.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href="https://vk.com" target="_blank"><i class="fa fa-vk"></i></a>
							<a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
						</div>
						<div class="user-panel">'; ?>

                        <?php
                            if(!Yii::$app->user->isGuest&&Yii::$app->user->identity->username==='admin')
                                echo
                                    '<a href = "'.Url::to(['/admin/']).'"><i class="fa fa-user-circle-o" ></i > Админ</a >';
                        ?>
                        <?php

                            $session = Yii::$app->session;
                            $session->open();
                            $cartCount = (isset($_SESSION['cart.qty'])?$_SESSION['cart.qty']:0)+(isset($_SESSION['cartItem.qty'])?$_SESSION['cartItem.qty']:0);

                            echo Yii::$app->user->isGuest ? (
                                '<a href = "'.Url::to(['/site/register']).'"><i class="fa fa-user-circle-o" ></i > Регистрация</a >
                                <a href = "'.Url::to(['/site/login']).'" ><i class="fa fa-sign-in" ></i > Войти</a >'
                            ) : (
                                '<a href = "'.Url::to(['/cart']).'"><i class="fa fa-shopping-bag " ></i > Корзина (<span id="cartCount">'.$cartCount.'</span>)</a >
                                 <a href = "'.Url::to(['/site/logout']).'" ><i class="fa fa-sign-in" ></i > Выйти</a >'
                            );
                        ?>
                        <?php echo '
						</div>
					</div>
				</div>
			</div>
		</div>
            <div  class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="site-navbar">
                            <a href="/bmw" class="site-logo"><img src="/bmw/web/img/logo.png" alt=""></a>
                            <div class="nav-switch">
                                <i class="fa fa-bars"></i>
                            </div>
                            <ul class="main-menu">
                                <li><a href = "'.Url::to(['/site/index']).'">Главная</a></li>
                                <li><a href="'.Url::to(['/site/best']).'">Лучшее</a></li>
                                <li><a href = "'.Url::to(['/site/cars']).'">Автомобили</a></li>
                                <li><a href = "'.Url::to(['/site/items']).'">Товары</a></li>
                                <li><a href="'.Url::to(['/site/news']).'">Новости</a></li>
                                <li><a href="'.Url::to(['/site/contact']).'">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
	</header>
    ';
    } ?>

    <?= $content ?>


<!-- Footer section -->
<?php
if(Yii::$app->urlManager->parseRequest(Yii::$app->request)[0] != 'site/login' && Yii::$app->urlManager->parseRequest(Yii::$app->request)[0] != 'site/register'){

    echo '
<footer class="footer-section set-bg" style="background-image: url(/bmw/web/img/footer-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 footer-widget">
                
                <img style="background-color: rgba(255,255,255,1); padding :18px;" src="/bmw/web/img/logo.png" alt="">
                <p>"С удовольствием за рулем"</p>
                <div class="social">
                    <a href="https://vk.com" target="_blank"><i class="fa fa-vk"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 footer-widget">
                <div class="contact-widget">
                    <h5 class="fw-title">Контакты</h5>
                    <p><i class="fa fa-map-marker"></i>Москва, Красная площадь</p>
                    <p><i class="fa fa-phone"></i>89166102649</p>
                    <p><i class="fa fa-envelope"></i>shop@bmw.com</p>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <div class="footer-nav">
                <ul>
                    <li><a href = "'.Url::to(['/site/index']).'">Главная</a></li>
                    <li><a href="'.Url::to(['/site/best']).'">Лучшее</a></li>
                    <li><a href = "'.Url::to(['/site/cars']).'">Автомобили</a></li>
                    <li><a href = "'.Url::to(['/site/items']).'">Товары</a></li>
                    <li><a href="'.Url::to(['/site/news']).'">Новости</a></li>
                    <li><a href="'.Url::to(['/site/contact']).'">Контакты</a></li>
                </ul>
            </div>
            
        </div>
    </div>
</footer>';}?>
<!-- Footer section end -->

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

