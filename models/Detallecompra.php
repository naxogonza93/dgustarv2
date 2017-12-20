<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detallecompra".
 *
 * @property integer $id_detalle
 * @property integer $id_de_compra
 * @property integer $id_de_producto
 * @property integer $precio_final
 * @property integer $cantidad
 *
 * @property Compra $idDeCompra
 * @property Producto $idDeProducto
 */
class Detallecompra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallecompra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_de_compra', 'id_de_producto', 'precio_final', 'cantidad'], 'required'],
            [['id_de_compra', 'id_de_producto', 'precio_final', 'cantidad'], 'integer'],
            [['id_de_compra'], 'exist', 'skipOnError' => true, 'targetClass' => Compra::className(), 'targetAttribute' => ['id_de_compra' => 'id_compra']],
            [['id_de_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_de_producto' => 'id_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detalle' => 'Id Detalle',
            'id_de_compra' => 'Id De Compra',
            'id_de_producto' => 'Producto',
            'precio_final' => 'Precio Final',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDeCompra()
    {
        return $this->hasOne(Compra::className(), ['id_compra' => 'id_de_compra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_de_producto']);
    }


    public function val1($attribute,$params, $id)
    {

        $stock = Producto::model()->findOne($id);

        if($this->$attribute > $stock->CantidadMedicamento)
            $this->addError($attribute,"Esta cantidad es mayor a la de el medicamento en existencia");
    }
}

