<?php
/**
 * Created by PhpStorm.
 * User: snolly
 * Date: 01.12.2018
 * Time: 1:14
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload($route = 'uploads/')
    {
        if ($this->validate()) {
            $this->imageFile->saveAs($route . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}