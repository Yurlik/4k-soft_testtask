<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;



/* @var $this yii\web\View */


$this->title = 'Yii test task Application';



?>


<?php


if(!Yii::$app->user->isGuest) {
echo '<span class="counter">';
    echo Yii::$app->user->identity->counter;
echo '</span>';
?>
    <?php $formCounter = ActiveForm::begin([
        'id' => 'counter-form',
        'layout' => 'inline',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-12 input_wrap\" style='margin-bottom: 10px;'>{input}</div>\n<div class=\"col-lg-12\"  style='margin-bottom: 10px;'>{error}</div>",
            'labelOptions' => ['class' => 'col-lg-12 control-label'],
        ],
    ]); ?>
    <?= $formCounter->field($modelCount, 'counter')->label(false)->hiddenInput(['value' => Yii::$app->user->identity->counter]); ?>
    <?= $formCounter->field($modelCount, 'username')->label(false)->hiddenInput(['value' => Yii::$app->user->identity->username]); ?>
    <div class="form-group col-lg-12">
        <div class="input_wrap">
            <?= Html::submitButton('+1', ['class' => 'btn btn-primary', 'name' => 'increment-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
<?php


    echo '<br>';
    echo Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post'], ['class' => 'logout-btn']]);
}
?>