<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */

$this->title = 'Create Detallecompra';
$this->params['breadcrumbs'][] = ['label' => 'Detallecompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-create">

    <h1><?= "Agregar producto a la compra" ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
