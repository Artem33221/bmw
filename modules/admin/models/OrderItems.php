<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Orders;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $car_id
 * @property int $price
 * @property int $sum
 * @property int $qty
 * @property string $name
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrders(){
        return $this->hasOne(Orders::className(), ['id'=>'order_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'price', 'sum', 'qty', 'name'], 'required'],
            [['order_id', 'product_id', 'car_id', 'price', 'sum', 'qty'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'car_id' => 'Car ID',
            'price' => 'Price',
            'sum' => 'Sum',
            'qty' => 'Qty',
            'name' => 'Name',
        ];
    }
}
