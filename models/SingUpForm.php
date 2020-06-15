<?php
/**
 * Created by PhpStorm.
 * User: yuser
 * Date: 12.06.2020
 * Time: 17:42
 */

namespace app\models;

use yii\base\Model;

use app\models\User;
use Yii;
use DateTime;

class SingUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $birthday;


    public function save(){
        if($this->validate()){
            $user = new User();

            $now_time = time();

            $dt = DateTime::createFromFormat('d-m-Y', $this->birthday);

            $unixBirthday = $dt->getTimestamp();

            $user->birthday = $unixBirthday;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->created_at = $now_time;
            $user->updated_at = $now_time;
            $user->counter = 0;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();

        }else{
            return false;
        }
    }

    public function validateBirthday($attribute, $params)
    {


        $days = date_diff(new DateTime(), DateTime::createFromFormat('d-m-Y', $this->birthday))->days;
        $chislo = intdiv($days,365);

        if($chislo<5){
            Yii::$app->session->setFlash('danger', 'Too young!');
            $this->addError($attribute, 'Too young!');
        }
        elseif($chislo>150){
            Yii::$app->session->setFlash('danger', 'Too old!');
            $this->addError($attribute, 'Too old!');
        }


    }



    public function rules()
    {

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 3, 'max' => 128],
            [['username'], 'unique', 'targetClass' => User::className()],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className()],

            ['password', 'required'],
            ['password', 'string', 'min' => 3],

            //['birthday', 'required'],
            //[['birthday'], 'datetime', 'format' => 'php:d.m.Y H:i', 'timestampAttribute' => 'public_date'],
            ['birthday', 'validateBirthday'],


        ];
    }



}