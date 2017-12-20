<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_producto
 * @property string $nombre
 * @property integer $precio
 *
 * @property Detallecompra[] $detallecompras
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'precio'], 'required'],
            [['precio'], 'integer'],
            [['nombre'], 'string', 'max' => 20],
            [['stock'],'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'stock' =>'Stock',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallecompras()
    {
        return $this->hasMany(Detallecompra::className(), ['id_de_producto' => 'id_producto']);
    }
}
