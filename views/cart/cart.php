<div class="site-breadcrumb">
    <div class="container">
        <a href="/bmw"><i class="fa fa-home"></i>Главная</a>
        <span><i class="fa fa-angle-right"></i>Корзина</span>
    </div>
</div>

<?php if(!empty($session['cart'])||!empty($session['cartItem'])):?>

    <link rel="stylesheet" type="text/css" href="../../web/css/cart.css">
    <div class="colorlib-product">
        <div class="container">

            <?php if(Yii::$app->session->hasFlash('success')) : ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                <?php echo Yii::$app->session->getFlash('success')?>
            </div>
            <?php endif;?>

            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="product-name d-flex">
                        <div class="one-forth text-left px-4">
                            <span>Товар</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Цена</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Количество</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Всего</span>
                        </div>
                        <div class="one-eight text-center px-4">
                            <span>Удалить</span>
                        </div>
                    </div>
                    <?php if($session['cart']) foreach ($session['cart'] as $id => $item): ?>
                        <div class="product-cart d-flex">
                            <div class="one-forth">
                                <div class="product-img" style="background-image: url(../../web<?= $item['img'] ?>);">
                                </div>
                                <div class="display-tc">
                                    <h3><?= $item['title'] ?></h3>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">$<?= $item['price'] ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <input type="text" id="quantity<?= $id ?>" name="quantity" onchange="changeQty(event, <?= $item['price'] ?>, '<?= $id ?>', <?= $item['qty'] ?>, <?= $session['cart.sum']+$session['cartItem.sum']?>, <?= $session['cart.qty']+$session['cartItem.qty']?>)" class="form-control input-number text-center" value="<?= $item['qty'] ?>" min="1" max="100">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span id="sum<?= $id ?>" class="price">$<?= $item['qty']*$item['price'] ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="<?php echo \yii\helpers\Url::to(['cart/delete-car','id' => $id]) ?>" class="closed"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                    <?php if($session['cartItem']) foreach ($session['cartItem'] as $id => $item): ?>
                        <div class="product-cart d-flex">
                            <div class="one-forth">
                                <div class="product-img" style="background-image: url(../../web<?= $item['img'] ?>);">
                                </div>
                                <div class="display-tc">
                                    <h3><?= $item['title'] ?></h3>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">$<?= $item['price'] ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <input type="text" id="quantityItem<?= $id ?>" name="quantity" onchange="changeQtyItem(event, <?= $item['price'] ?>, '<?= $id ?>', <?= $item['qty'] ?>, <?= $session['cart.sum']+$session['cartItem.sum']?>, <?= $session['cart.qty']+$session['cartItem.qty']?>)" class="form-control input-number text-center" value="<?= $item['qty'] ?>" min="1" max="100">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span id="sumItem<?= $id ?>" class="price">$<?= $item['qty']*$item['price'] ?></span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="<?php echo \yii\helpers\Url::to(['cart/delete-item','id' => $id]) ?>" class="closed"></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="row row-pb-lg">
                <div class="col-md-12">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-sm-8">
                                <form action="<?php echo \yii\helpers\Url::to(['cart/submit']) ?>">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <input type="text" name="name" value="" placeholder="Ваше имя" class="form-control">
                                            <br>
                                            <input type="text" name="phone" value="" placeholder="Ваш номер телефона" class="form-control">
                                            <br>
                                            <input type="submit" value="Подтвердить покупку" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Количество товара:</span> <span id="summary_count"><?= $session['cart.qty']+$session['cartItem.qty'] ?></span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p><span><strong>Сумма:</strong></span> <span id="summary_money">$ <?= $session['cart.sum']+$session['cartItem.sum'] ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else :?>
<div class="colorlib-product">
    <div class="container">
    <h3>Корзина пуста</h3>
        <br><br>
    </div>
</div>
<?php endif;?>


