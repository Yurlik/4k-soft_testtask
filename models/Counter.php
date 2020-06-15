<?php
/**
 * Created by PhpStorm.
 * User: yuser
 * Date: 14.06.2020
 * Time: 15:14
 */

namespace app\models;

use yii\base\Model;
use app\models\User;
use Yii;

class Counter extends Model
{
    public $username;
    public $counter;

    private $_user = false;

    public function rules()
    {
        return [

        ];
    }

    public function increment(){

        $user = User::findByUsername(Yii::$app->user->identity->username);
        $user->counter++;

        return $user->save();
    }



}