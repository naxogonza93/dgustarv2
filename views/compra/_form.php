<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

use app\models\Cliente;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    
    ?>

    <?php
         
   echo $form->field($model, 'cliente')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Cliente::find()->all(),'rut_cliente','nombre','apellido'),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione un cliente'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>  
    </div>

    <?php ActiveForm::end(); ?>

</div>
