<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */

$this->title = 'Update Detallecompra: ' . $model->id_detalle;
$this->params['breadcrumbs'][] = ['label' => 'Detallecompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalle, 'url' => ['view', 'id' => $model->id_detalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallecompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
