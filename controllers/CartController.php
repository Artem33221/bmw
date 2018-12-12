<?php

namespace app\controllers;

use app\models\Items;
use app\models\OrderItems;
use app\models\Orders;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use app\models\Cars;
use app\models\Cart;

class CartController extends Controller
{

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->render('cart', compact('session'));
    }

    public function actionAddCar()
    {
        Yii::$app->db;
        $id = Yii::$app->request->get('id');
        if($id)
        {
            $product = Cars::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product);

            return $this->redirect(Yii::$app->request->referrer);

        }
    }

    public function actionUpdateCar()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        if($id)
        {
            $product = Cars::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->updateProductCountCart($product, $qty);
            return true;
        }

    }

    public function actionDeleteCar()
    {
        $id = Yii::$app->request->get('id');
        if($id)
        {
            $product = Cars::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->deleteProductCart($product);

            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    /////////////////////////////////////////////////////////////////////

    public function actionAddItem()
    {
        Yii::$app->db;
        $id = Yii::$app->request->get('id');
        if($id)
        {
            $product = Items::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCartItem($product);

            return $this->redirect(Yii::$app->request->referrer);

        }
    }

    public function actionUpdateItem()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        if($id)
        {
            $product = Items::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->updateProductCountCartItem($product, $qty);

            return true;
        }

    }

    public function actionDeleteItem()
    {
        $id = Yii::$app->request->get('id');
        if($id)
        {
            $product = Items::findOne($id);
            if(empty($product)) return false;

            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->deleteProductCartItem($product);

            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionSubmit()
    {
        $session = Yii::$app->session;
        $session->open();

        $name = Yii::$app->request->get('name');
        $phone = Yii::$app->request->get('phone');

        $order = new Orders();
        $order->name = $name;
        $order->phone = $phone;
        $order->qty = $session['cart.qty']+$session['cartItem.qty'];
        $order->sum = $session['cart.sum']+$session['cartItem.sum'];
        $order->created_at = new Expression('NOW()');

        if($order->save()){
            $this->saveOrderItems($session['cart'], $session['cartItem'], $order->id);
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            $session->remove('cartItem');
            $session->remove('cartItem.qty');
            $session->remove('cartItem.sum');
            Yii::$app->session->setFlash('success','Ваш заказ принят');
            return $this->redirect(Yii::$app->request->referrer);
        }
        else return $this->goHome();

    }

    protected function saveOrderItems($items1, $items2, $order_id)
    {
        foreach ($items1 as $id=>$item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->car_id = $id;
            $order_items->name = $item['title'];
            $order_items->price = $item['price'];
            $order_items->qty = $item['qty'];
            $order_items->sum = $item['qty']*$item['price'];
            $order_items->save();
        }

        foreach ($items2 as $id=>$item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['title'];
            $order_items->price = $item['price'];
            $order_items->qty = $item['qty'];
            $order_items->sum = $item['qty']*$item['price'];
            $order_items->save();
        }
    }



}
