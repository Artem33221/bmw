<?php
use yii\helpers\Url;
?>

	<!-- Hero section -->
	<section class="hero-section set-bg" style="background-image: url(/bmw/web/img/bmw/1.jpg)">
		<div class="container hero-text text-white">
            <div class="hero-text-block">
                <h2>Добро пожаловать в мир BMW</h2>
                <p>"С удовольствием за рулем".</p>
                <a href="<?php echo Url::to(['site/cars']) ?>" class="site-btn btn-white">Посмотреть автомобили</a>
            </div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			<form action="/bmw/site/search" method="get" class="filter-form">
				<input type="text" name="text" placeholder="Что вы желаете найти?">

				<button class="site-btn fs-submit">Поиск</button>
			</form>
		</div>
	</div>
	<!-- Filter form section end -->



	<!-- Properties section -->
	<section class="properties-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>ПОСЛЕДНИЕ ОБНОВЛЕНИЯ</h3>
				<p>Вы всегда можете выбрать больше из списка товаров</p>
			</div>


			<div class="row">
                <?php foreach ($cars_updates as $car): ?>
				<div class="col-md-6">
					<div class="propertie-item set-bg" style="background-image: url(/bmw/web<?=$car->img?>)">
						<div class="propertie-info text-white">
							<div class="info-warp">
                                <a href="<?php echo Url::to(['car','id' => $car->id]) ?>">
								<h5><?=$car->title?></h5>
                                </a>
							</div>
							<div class="price">$<?=$car->price?></div>
						</div>
					</div>
				</div>
                <?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- Properties section end -->


	<!-- Services section -->
	<section class="services-section spad set-bg" style="background-image: url(/bmw/web/img/service-bg.jpg)">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="/bmw/web/img/service.jpg" alt="">
				</div>
				<div class="col-lg-5 offset-lg-1 pl-lg-0">
					<div class="section-title text-white">
						<h3>Наши услуги</h3>
						<p>Мы можем предложить Вам следующие услуги:</p>
					</div>
					<div class="services">
						<div class="service-item">
							<i class="fa fa-comments"></i>
							<div class="service-text">
								<h5>Поддержка</h5>
								<p>Круглосуточная онлайн поддержка по любым вопросам.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-home"></i>
							<div class="service-text">
								<h5>Доставка прямо на дом</h5>
								<p>Любой автомобиль или товар с нашего магазина окажется прямо перед Вашим домом!</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-briefcase"></i>
							<div class="service-text">
								<h5>Оформим по закону</h5>
								<p>Наши юристы помогут Вам правильно оформить необходимый пакет документов.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->


	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Лучшие предложения</h3>
				<p>Воспользуйтесь популярными товарами</p>
			</div>
			<div class="row">
                <?php foreach ($cars_best as $car): ?>
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
		</div>
	</section>
	<!-- feature section end -->



	<!-- feature category section -->
	<section class="feature-category-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Что мы продаём</h3>
				<p>Вы можете купить как и автомобиль, так и оригинальные товары к нему</p>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 f-cata">
                    <a href="/site/cars"><img src="/bmw/web/img/bmw/1.jpg" alt=""></a>
					<h5>Автомобили</h5>
				</div>
				<div class="col-lg-6 col-md-6 f-cata">
					<a href="/site/items"><img height="243px" width="540px" src="/bmw/web/img/dbe7edu-960.jpg" alt=""></a>
					<h5>Сопутствующие товары</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- feature category section end-->


	<!-- Blog section -->
	<section class="blog-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Последние новости</h3>
				<p>Мы поможем Вам всегда оставаться в тренде</p>
			</div>
			<div class="row">
                <?php foreach ($news_last as $new): ?>
				<div class="col-lg-4 col-md-6 blog-item">
					<img src="/bmw/web<?=$new->img?>" alt="">
					<h5><a href="<?php echo Url::to(['new','id' => $new->id]) ?>"><?=$new->title?></a></h5>
					<div class="blog-meta">
						<span><i class="fa fa-clock-o"></i><?=$new->date?></span>
					</div>
					<p><?= strlen($new->text)>122 ? (substr($new->text, 0, 120).'...') : ($new->text)?></p>
				</div>
                <?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- Blog section end -->

