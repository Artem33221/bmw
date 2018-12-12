<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\OrderItems;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property int $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $phone
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(), ['order_id'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'qty', 'sum', 'name', 'phone'], 'required'],
            [['created_at'], 'safe'],
            [['qty'], 'integer'],
            [['sum'], 'number'],
            [['status'], 'string'],
            [['name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'created_at' => 'Заказ сделан',
            'qty' => 'Кол-во',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'phone' => 'Телефон',
        ];
    }
}
