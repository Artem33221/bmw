
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/"><i class="fa fa-home"></i>Главная</a>
        <a href="<?php echo Url::to(['site/cars']) ?>"><i class="fa fa-angle-right"></i>Автомобили</a>
        <span><i class="fa fa-angle-right"></i><?= $car->title ?></span>
    </div>
</div>

<!-- Page -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 single-list-page">

                <img src="/bmw/web<?= $car->img ?>" alt="">

                <div class="single-list-content">
                    <div class="row">
                        <div class="col-xl-8 sl-title">
                            <h2><?= $car->title ?></h2>
                            <p><i class="fa fa-dollar"></i><?= $car->price ?></p>
                        </div>
                        <div class="col-xl-4">
						<?php if(!Yii::$app->user->isGuest)
							echo '
                            <a href="'.Url::to(['/cart/add-car','id' => $car->id]).'" data-id="'.$car->id.'" class="price-btn btn-white btn-add-to-cart">Добавить в корзину</a>'
                        ?> 
                        </div>
                    </div>
                    <h3 class="sl-sp-title">Характеристики</h3>
                    <div class="row property-details-list">
                        <div class="col-md-4 col-sm-6">
                            <p><i class="fa fa-free-code-camp"></i> <?= $car->fuel ?></p>
                            <p><i class="fa fa-cogs"></i> <?= $car->gear ?></p>
                            <?= $car->is_conder?'<p><i class="fa fa-check-circle-o"></i> Кондиционер</p>':''?>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <p><i class="fa fa-car"></i> <?= $car->engine ?></p>
                            <p><i class="fa fa-users"></i><?= $car->places ?> мест</p>

                        </div>
                        <div class="col-md-4">
                            <p><i class="fa fa-clock-o"></i> <?= $car->date ?></p>
                            <p><i class="fa fa-tachometer"></i> <?= $car->transmission ?> коробка</p>
                        </div>
                    </div>
                    <h3 class="sl-sp-title">Описание</h3>
                    <div class="description">
                        <p><?= $car->description ?></p>
                    </div>

                    <h3 class="sl-sp-title bd-no">Подробная информация</h3>
                    <div id="accordion" class="plan-accordion">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">Кузов: <i class="fa fa-angle-down"></i></button>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    <img src="./../../web/img/bmw/1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Подробное описание: <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                <p style="padding: 15px 0"><?= $car->property_desc ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Page end -->
