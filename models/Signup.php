<?php
/**
 * Created by PhpStorm.
 * User: snolly
 * Date: 29.11.2018
 * Time: 0:06
 */

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $username;
    public $password;

    public  function  rules()
    {
        return [
            [['username','password'], 'required'],
            ['password','string','min'=>2,'max'=>10, 'message'=>'Пароль должен быть от 2 до 10 символов!'],
            ['username','unique','targetClass'=>'app\models\User', 'message'=>'Данное имя уже занято!']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);

        return $user->save();
    }

}