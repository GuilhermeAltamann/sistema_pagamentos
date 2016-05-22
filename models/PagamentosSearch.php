<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pagamentos;

/**
 * PagamentosSearch represents the model behind the search form about `app\models\Pagamentos`.
 */
class PagamentosSearch extends Pagamentos
{
    public function rules()
    {
        return [
            [['idpagamento', 'idforma_pagamento', 'idcliente'], 'integer'],
            [['vencimento'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Pagamentos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idpagamento' => $this->idpagamento,
            'vencimento' => $this->vencimento,
            'idforma_pagamento' => $this->idforma_pagamento,
            'idcliente' => $this->idcliente,
        ]);

        return $dataProvider;
    }
}
