<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property integer $id_compra
 * @property string $fecha
 * @property string $cliente
 *
 * @property Cliente $cliente0
 * @property Detallecompra[] $detallecompras
 */
class Compra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'cliente'], 'required'],
            [['fecha'], 'safe'],
            [['cliente'], 'string', 'max' => 10],
            [['cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente' => 'rut_cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_compra' => 'Id Compra',
            'fecha' => 'Fecha',
            'cliente' => 'Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente0()
    {
        return $this->hasOne(Cliente::className(), ['rut_cliente' => 'cliente']);
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecompras()
    {
        return $this->hasMany(Detallecompra::className(), ['id_de_compra' => 'id_compra']);
    }
    
    public static function obtieneTotalCompraPorItem($model){
        //obtiene el total por item en compras..
        $provider=DetalleCompra::find()->where(['id_de_compra'=>$model->id_compra])->all();
        $sumatoria=0;
        foreach($provider as $key => $val){
            //$val sería un detalle de compra
            $sumatoria=$sumatoria+($val->cantidad*$val->producto->precio);
        }
        return $sumatoria;
        
    }
    
    public static function totalCompras($dataProvider2){
        //recive un provider de detalle de compra....
        $sumatoria=0;
        foreach($dataProvider2->getModels() as $key => $val){
            $sumatoria+=($val->cantidad*$val->producto->precio);
        }
        return $sumatoria;
    }
     public static function totalComprasVtasDiarias(){
         //obtengo todas las compras
        $compras=Compra::find()->where(['fecha'=>date('Y-m-d')])->all();
        $sumatoria=0;
        foreach($compras as $compra){
            foreach($compra->detallecompras as $detalle){
               $sumatoria=$sumatoria+($detalle->cantidad * $detalle->producto->precio);   
            }
        }
        return $sumatoria;
    }
}
