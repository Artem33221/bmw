
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/bmw"><i class="fa fa-home"></i>Главная</a>
        <span><i class="fa fa-angle-right"></i>Автомобили</span>
    </div>
</div>


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

        <?= LinkPager::widget([
            'pagination' => $pagination,
            'options' => [
                'class' => 'site-pagination',
                'firstPageLabel' => '',
                'lastPageLabel' => '',
                'prevPageLabel' => 'previous',
                'nextPageLabel' => 'next',

                'pageCssClass' => 'filter_nav',
                'nextPageCssClass' => 'prev_s',
                'nextPageCssClass' => 'next_s',

                'firstPageCssClass' => 'lknflbes',
                'maxButtonCount' => 1,
            ]
        ]) ?>
    </div>
</section>