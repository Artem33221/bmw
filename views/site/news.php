
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/bmw"><i class="fa fa-home"></i>Главная</a>
        <span><i class="fa fa-angle-right"></i>Новости</span>
    </div>
</div>

<!-- page -->
<section class="page-section blog-page">
    <div class="container">
        <div class="row">
            <!-- blog post -->
            <?php foreach ($news as $new): ?>
                <div class="col-lg-4 col-md-6 blog-item">
                    <img src="/bmw/web<?= $new->img ?>" alt="">
                    <h5><a href="<?php echo Url::to(['new','id' => $new->id]) ?>"><?= $new->title ?></a></h5>
                    <div class="blog-meta">
                        <span><i class="fa fa-clock-o"></i><?= $new->date ?></span>
                    </div>
                    <p><?= strlen($new->text)>122 ? (substr($new->text, 0, 120).'...') : ($new->text)?></p>
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
<!-- page end -->