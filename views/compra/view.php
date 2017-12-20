<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\models\Compra;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Compra */

$this->title = $model->id_compra;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Venta:N° ".$this->title;
?>
<div class="compra-view">

    <?= Html::button('Agregar Producto', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['detallecompra/create', 'id_compra' => $model->id_compra]), 'class' => 'btn btn-success']) ?>


    <?php
        Modal::begin([
            'id'     => 'model',
            'size'   => 'model-lg',
        ]);

         echo "<div id='modelContent'></div>";

        Modal::end();
    ?>
<script>
    $(function(){
    $('#modelButton').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
});
</script>


<?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'id producto',
                'value'=>'id_de_producto',
            ],
            [
                'header'=>'Producto',
                'value'=>function($model){
                    return $model->producto->nombre;
                }
            ],
            [
                'header' => 'Precio',
                'value' => function($model){
                    return "$".number_format($model->producto->precio);
                }
            ],
            [
              'header'=>'Cantidad',
              'value' =>function ($model){
                  return $model->cantidad;
              },
                'footer'=>'<b>Total General</b>',
            ],
            
            [
              'header'=>'Total Linea',
              'value' =>function ($model){
                  return "$".number_format($model->cantidad * $model->producto->precio);
              },
                'footer'=>"$".number_format(Compra::totalCompras($dataProvider2)),
            ],

            ['class' => 'yii\grid\ActionColumn',
                 'template' => '{delete}',
            ],
        ],
    ]); 

    ?>
    <?= Html::a('Finalizar Venta', ['/compra/create'], ['class'=>'btn btn-danger grid-button']) ?>
</div>
