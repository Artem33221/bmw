<!--<section class="hero-section set-bg" style="background-image: url(./../../web/img/bmw/1.jpg)">-->
<!--    <div class="container text-white">-->
<!--        <h2>Featured Listings</h2>-->
<!--    </div>-->
<!--</section>-->
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/"><i class="fa fa-home"></i>Главная</a>
        <a href="<?php echo Url::to(['site/items']) ?>"><i class="fa fa-angle-right"></i>Товары</a>
        <span><i class="fa fa-angle-right"></i><?= $item->title ?></span>
    </div>
</div>

<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 single-list-page">

                <img src="/bmw/web<?= $item->img ?>" alt="">

                <div class="single-list-content">
                    <div class="row">
                        <div class="col-xl-8 sl-title">
                            <h2><?= $item->title ?></h2>
                            <p><i class="fa fa-dollar"></i><?= $item->price ?></p>
                        </div>
                        <div class="col-xl-4">
						<?php if(!Yii::$app->user->isGuest)
							echo '
                            <a href="'.Url::to(['/cart/add-item','id' => $item->id]).'" data-id="'.$item->id.'" class="price-btn btn-white btn-add-to-cart">Добавить в корзину</a>'
                        ?>
						</div>
                    </div>

                    <h3 class="sl-sp-title">Описание</h3>
                    <div class="description">
                        <p><?= $item->description ?></p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Page end -->

