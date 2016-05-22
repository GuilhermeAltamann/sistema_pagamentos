<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formas_pagamento".
 *
 * @property integer $idforma_pagamento
 * @property string $nome
 *
 * @property Pagamentos[] $pagamentos
 */
class FormasPagamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formas_pagamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 35],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idforma_pagamento' => 'Idforma Pagamento',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamentos::className(), ['idforma_pagamento' => 'idforma_pagamento']);
    }
    
}
