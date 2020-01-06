<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * SignupForm is the model behind the sign up form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $email;
    public $name;
    public $roles = 'user';
    public $password;
    public $password_repeat;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password', 'password_repeat'], 'required'],
            [['email', 'password', 'password_repeat'], 'string', 'min' => 4, 'max' => 30],
            [['password', 'password_repeat'], 'string', 'min' => 8, 'max' => 32],
            ['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->roles = $this->roles;
        // $user->auth_key = \Yii::$app->security->generateRandomString();
        // $user->access_token = \Yii::$app->security->generateRandomString();
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        if ($user->save()){
            return true;
        }

        \Yii::error("User was not saved: ".VarDumper::dumpAsString($user->errors));
        return false;
    }

}

    
