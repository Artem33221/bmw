<?php
/**
 * Created by PhpStorm.
 * User: snolly
 * Date: 29.11.2018
 * Time: 0:32
 */

namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public $username;
    public $password;

    public  function  rules()
    {
        return [
            [['username','password'], 'required'],
            ['password','string','min'=>2,'max'=>10],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Пароль или пользователь введены неверно!');
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['username'=>$this->username]);
    }



}