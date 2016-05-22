<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormasPagamento;

/**
 * FormasPagamentoSearch represents the model behind the search form about `app\models\FormasPagamento`.
 */
class FormasPagamentoSearch extends FormasPagamento
{
    public function rules()
    {
        return [
            [['idforma_pagamento'], 'integer'],
            [['nome'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = FormasPagamento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idforma_pagamento' => $this->idforma_pagamento,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome]);

        return $dataProvider;
    }
}
