
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<!-- Breadcrumb -->
<div class="site-breadcrumb">
    <div class="container">
        <a href="/bmw"><i class="fa fa-home"></i>Главная</a>
        <a href="<?php echo Url::to(['site/news']) ?>"><i class="fa fa-angle-right"></i>Новости</a>
        <span><i class="fa fa-angle-right"></i><?= $new['title'] ?></span>
    </div>
</div>



<section class="page-section single-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-10 singel-blog-content">
                <h2><?= $new['title'] ?></h2>
                <br>
                <img src="/bmw/web<?= $new->img ?>" alt="">
                <p><?= $new['text'] ?>.</p>
                <div class="blog-tags">
                    <p>Тэги:</p>
                    <?php
                        $tags = explode(' ',$new['tags']);
                        foreach ($tags as $tag){
                            echo '<a>#'.$tag.'</a> ';
                        }
                    ?>

                </div>


            </div>
        </div>
    </div>
</section>