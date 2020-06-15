<?php

namespace app\controllers;

use Yii;
use app\models\SingUpForm;
use app\models\User;


class UserController extends \yii\web\Controller
{
    public function actionSingup()
    {
        $model = new SingUpForm();

//        if($model->load(Yii::$app->request->post()) && $model->save()){
//            Yii::$app->session->setFlash('success', 'User registered');
//            return $this->redirect(['site/index']);
//        }

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'User registered');

            $user = User::findByUsername(Yii::$app->request->post()['SingUpForm']['username']);
            Yii::$app->user->login($user);

            return $this->redirect(['site/count']);
        }

        return $this->render('singup',[
            'model' => $model,
        ]);
    }

}
