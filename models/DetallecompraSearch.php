<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detallecompra;

/**
 * DetallecompraSearch represents the model behind the search form about `app\models\Detallecompra`.
 */
class DetallecompraSearch extends Detallecompra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalle', 'id_de_compra', 'id_de_producto', 'precio_final', 'cantidad'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Detallecompra::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_detalle' => $this->id_detalle,
            'id_de_compra' => $this->id_de_compra,
            'id_de_producto' => $this->id_de_producto,
            'precio_final' => $this->precio_final,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
