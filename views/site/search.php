
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/bmw"><i class="fa fa-home"></i>Главная</a>
        <span><i class="fa fa-angle-right"></i>Поиск</span>
    </div>
</div>

<?php if(!empty($cars)||!empty($items)||!empty($news)):?>
<!-- page -->
<section class="page-section categories-page">
    <div class="container">
        <div class="row">
            <?php foreach ($cars as $car): ?>
                <div class="col-lg-4 col-md-6">
                    <!-- feature -->
                    <div class="feature-item">
                        <div class="feature-pic set-bg"  style="background-image: url(/bmw/web<?= $car->img ?>)">
                            <?php if($car->is_best) echo '<div class="sale-notic">Лучшее</div>'; ?>
                        </div>
                        <div class="feature-text">
                            <div class="text-center feature-title">
                                <h5><?= $car->title ?></h5>
                            </div>
                            <div class="room-info-warp">
                                <div class="room-info">
                                    <div class="rf-left">
                                        <p><i class="fa fa-car"></i>  <?= $car->engine ?></p>
                                        <p><i class="fa fa-cogs"></i> <?= $car->gear ?></p>
                                    </div>
                                    <div class="rf-right">
                                        <p><i class="fa fa-free-code-camp"></i> <?= $car->fuel ?></p>
                                        <p><i class="fa fa-users"></i> <?= $car->places ?> мест</p>
                                    </div>
                                </div>
                                <div class="room-info">
                                    <!--                                    <div class="rf-left">-->
                                    <!--                                        <p><i class="fa fa-user"></i> Tony Holland</p>-->
                                    <!--                                    </div>-->
                                    <div class="rf-right">
                                        <p><i class="fa fa-clock-o"></i><?= $car->date ?></p>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo Url::to(['car','id' => $car->id]) ?>" class="room-price btn-white">$ <?= $car->price ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if($items) echo ' <hr><br><br><br><br>' ?>

        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <!-- feature -->
                    <div class="feature-item">
                        <div class="feature-pic set-bg" style="background-image: url(/bmw/web<?= $item->img ?>)">
                            <?php if($item->is_best) echo '<div class="sale-notic">Лучшее</div>'; ?>
                        </div>
                        <div class="feature-text">
                            <div class="text-center feature-title">
                                <h5><?= $item->title ?></h5>

                            </div>
                            <div class="room-info-warp">
                                <div class="room-info">
                                    <div class="rf-right">
                                        <p><i class="fa fa-clock-o"></i><?= $item->date ?></p>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo Url::to(['item','id' => $item->id]) ?>" class="room-price btn-white">$<?= $item->price ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <?php if($news) echo ' <hr><br><br><br><br>' ?>

        <div class="row">
            <?php foreach ($news as $new): ?>
                <div class="col-lg-4 col-md-6 blog-item">
                    <img src="/bmw/web<?= $new->img ?>" alt="">
                    <h5><a class="btn-white" href="<?php echo Url::to(['new','id' => $new->id]) ?>"><?= $new->title ?></a></h5>
                    <div class="blog-meta">
                        <span><i class="fa fa-clock-o"></i><?= $new->date ?></span>
                    </div>
                    <p><?= strlen($new->text)>122 ? (substr($new->text, 0, 120).'...') : ($new->text)?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php else :?>
<div class="colorlib-product">
    <div class="container">
    <h3>По вашему запросу ничего не найдено</h3>
        <br><br>
    </div>
</div>
<?php endif;?>
<!-- page end -->