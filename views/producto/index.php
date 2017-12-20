<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <p>
        <?= Html::a('Exportar PDF', ['generarpdf'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'id_producto',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
           [
                'attribute'=>'nombre',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
            ],
            [
                'attribute'=>'precio',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' =>  ['class' => 'text-center'],
                'value' =>function($model){
                    return "$".number_format($model->precio);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
