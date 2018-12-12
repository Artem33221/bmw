<?php
/**
 * Created by PhpStorm.
 * User: snolly
 * Date: 30.11.2018
 * Time: 14:43
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'title' => $product->title,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function updateProductCountCart($product, $qty = 1)
    {
        $oldProductQty = $_SESSION['cart'][$product->id]['qty'];

        $_SESSION['cart.qty'] = $_SESSION['cart.qty']-$oldProductQty;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum']-$oldProductQty* $product->price;

        $_SESSION['cart'][$product->id]['qty'] = $qty;

        $_SESSION['cart.qty'] =  $_SESSION['cart.qty'] + $qty;
        $_SESSION['cart.sum'] =  $_SESSION['cart.sum'] + $qty * $product->price;

    }

    public function deleteProductCart ($product)
    {
        $_SESSION['cart.qty'] =  $_SESSION['cart.qty'] - $_SESSION['cart'][$product->id]['qty'];
        $_SESSION['cart.sum'] =  $_SESSION['cart.sum'] - $_SESSION['cart'][$product->id]['qty'] * $_SESSION['cart'][$product->id]['price'];
        unset($_SESSION['cart'][$product->id]);
    }


    //////////////////////////////////////

    public function addToCartItem($product, $qty = 1)
    {
        if (isset($_SESSION['cartItem'][$product->id])) {
            $_SESSION['cartItem'][$product->id]['qty'] += $qty;
        } else {
            $_SESSION['cartItem'][$product->id] = [
                'qty' => $qty,
                'title' => $product->title,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        $_SESSION['cartItem.qty'] = isset($_SESSION['cartItem.qty']) ? $_SESSION['cartItem.qty'] + $qty : $qty;
        $_SESSION['cartItem.sum'] = isset($_SESSION['cartItem.sum']) ? $_SESSION['cartItem.sum'] + $qty * $product->price : $qty * $product->price;
    }

    public function updateProductCountCartItem($product, $qty = 1)
    {
        $oldProductQty = $_SESSION['cartItem'][$product->id]['qty'];

        $_SESSION['cartItem.qty'] = $_SESSION['cartItem.qty']-$oldProductQty;
        $_SESSION['cartItem.sum'] = $_SESSION['cartItem.sum']-$oldProductQty* $product->price;

        $_SESSION['cartItem'][$product->id]['qty'] = $qty;

        $_SESSION['cartItem.qty'] =  $_SESSION['cartItem.qty'] + $qty;
        $_SESSION['cartItem.sum'] =  $_SESSION['cartItem.sum'] + $qty * $product->price;

    }

    public function deleteProductCartItem ($product)
    {
        $_SESSION['cartItem.qty'] =  $_SESSION['cartItem.qty'] - $_SESSION['cartItem'][$product->id]['qty'];
        $_SESSION['cartItem.sum'] =  $_SESSION['cartItem.sum'] - $_SESSION['cartItem'][$product->id]['qty'] * $_SESSION['cartItem'][$product->id]['price'];
        unset($_SESSION['cartItem'][$product->id]);
    }

}