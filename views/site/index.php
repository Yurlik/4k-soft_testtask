<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;



/* @var $this yii\web\View */


$this->title = 'Yii test task Application';



?>


<?php
if(Yii::$app->user->isGuest) {

    ?>

    <div class="site-index">
        <div class="body-content">

            <div class="row">
                <div class="col-lg-offset-3 col-lg-6">

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'inline',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-12 input_wrap\" style='margin-bottom: 10px;'>{input}</div>\n<div class=\"col-lg-12\"  style='margin-bottom: 10px;'>{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-12 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group col-lg-12">
                        <div class="input_wrap">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>



                    <?php
                    if (!Yii::$app->user->isGuest) {
                        echo Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]);
                    } else {
                        echo Html::a('SingUp', ["user/singup"], ['class' => 'btn singup-btn btn-primary']);
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>

<?php
    }
?>