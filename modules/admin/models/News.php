<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property string $tags
 * @property string $img
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'date', 'tags', 'img'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['title', 'tags', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'date' => 'Дата',
            'tags' => 'Тэги',
            'img' => 'Изоюражение',
        ];
    }
}
