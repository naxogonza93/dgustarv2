<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Producto;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecompra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    
    echo $form->field($model, 'id_de_producto')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Producto::find()->all(),'id_producto','nombre'),
    'language' => 'es',
    'options' => ['placeholder' => 'Seleccione un producto'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);    
     ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
    
    ?>

</div>
