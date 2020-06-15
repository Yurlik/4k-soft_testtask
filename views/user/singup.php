<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */



    $this->title = 'SingUp';

?>
<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('danger') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('danger'); ?>
        </div>
    <?php endif;?>

    <p>Please fill out the following fields to singup:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'singup-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

     <?= '<div class="form-group field-singupform-birthday">
        <label class="col-lg-1 control-label" for="singupform-birthday">Birthday</label>
        <div class="col-lg-3">';?>
    <?= DateTimePicker::widget([
            'id' => 'singupform-birthday',
            'name' => 'SingUpForm[birthday]',
            'options' => ['placeholder' => 'Enter birth day ...'],
            'convertFormat' => true,
            'pluginOptions' => [
            'minView' => 2,
            'todayHighlight' => true,
            'todayBtn' => true,
            'format' => 'dd-MM-yyyy',
            'autoclose' => true,
            ]
        ]);
    ?>
    </div>
    <div class="col-lg-8"><p class="help-block help-block-error "></p></div>
</div>

    <div class="form-group">
        <div class="col-lg-12">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'singup-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

<?php
if(!Yii::$app->user->isGuest) {
    echo Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]);
}
?>


