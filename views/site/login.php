<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container d-flex align-items-center justify-content-center">
    <div class="row text-center pt-5">
        <div class="card">
        <div class="card-body">

            <h3><?= Html::encode($this->title) ?></h3>
            <hr/>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<div class=\"text-center pl-3 pr-3\">{label}\n<div class=\"text-center col-12\">{input}</div>{error}</div>",
                    'labelOptions' => ['class' => 'col-12 text-center control-label mb-3'],
                ],
            ]); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <div class="col-12">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
			
		</div>
	</div>
</div>
