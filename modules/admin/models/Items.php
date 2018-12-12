<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $title
 * @property double $price
 * @property string $description
 * @property int $is_best
 * @property string $img
 * @property string $date
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description', 'is_best', 'img', 'date'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['title', 'img'], 'string', 'max' => 255],
            [['is_best'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'is_best' => 'Лучшее?',
            'img' => 'Изображение',
            'date' => 'Дата добавления',
        ];
    }
}
