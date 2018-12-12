<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $title
 * @property double $price
 * @property int $is_best
 * @property string $description
 * @property string $img
 * @property string $body_img
 * @property string $property_desc
 * @property string $fuel топливо
 * @property string $transmission коробка
 * @property string $gear привод
 * @property string $engine двигатель
 * @property int $places кол-во мест
 * @property int $doors
 * @property int $is_conder
 * @property string $date
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'is_best', 'description', 'img', 'body_img', 'property_desc', 'fuel', 'transmission', 'gear', 'engine', 'places', 'doors', 'is_conder', 'date'], 'required'],
            [['price'], 'number'],
            [['description', 'property_desc'], 'string'],
            [['date'], 'safe'],
            [['title', 'img', 'body_img', 'engine'], 'string', 'max' => 255],
            [['is_best', 'is_conder'], 'string', 'max' => 1],
            [['fuel', 'transmission', 'gear'], 'string', 'max' => 50],
            [['places', 'doors'], 'string', 'max' => 4],
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
            'is_best' => 'Лучшее',
            'description' => 'Описание',
            'img' => 'Изображение',
            'body_img' => 'Изображение кузова',
            'property_desc' => 'Подробное описание',
            'fuel' => 'Топливл',
            'transmission' => 'Подвеска',
            'gear' => 'Коробка передач',
            'engine' => 'Двигатель',
            'places' => 'Кол-во мест',
            'doors' => 'Кол-во дверей',
            'is_conder' => 'Есть ли кондиционер',
            'date' => 'Дата добавления',
        ];
    }
}
