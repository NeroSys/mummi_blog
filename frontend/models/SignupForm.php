<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 11/14/17
 * Time: 11:00 AM
 */

namespace frontend\models;


use common\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $user;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['user', 'trim'],
            ['user', 'required'],
            ['user', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['user', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'targetAttribute' => 'email', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup(){

        if ($this->validate()){

            $user = new User();

            $user->attributes = $this->attributes;

            return $user->create();
        }
    }

}