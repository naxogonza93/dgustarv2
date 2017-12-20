<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */

$this->title = $model->id_detalle;
$this->params['breadcrumbs'][] = ['label' => 'Detallecompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detalle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detalle], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_detalle',
            'id_de_compra',
            'id_de_producto',
            'precio_final',
            'cantidad',
        ],
    ]) ?>

</div>
