<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pagamentos".
 *
 * @property integer $idpagamento
 * @property string $vencimento
 * @property integer $idforma_pagamento
 * @property integer $idcliente
 *
 * @property Clientes $idcliente0
 * @property FormasPagamento $idformaPagamento
 */
class Pagamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vencimento', 'idforma_pagamento', 'idcliente'], 'required'],
            [['vencimento'], 'safe'],
            [['idforma_pagamento', 'idcliente'], 'integer'],
            [['idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idcliente' => 'idcliente']],
            [['idforma_pagamento'], 'exist', 'skipOnError' => true, 'targetClass' => FormasPagamento::className(), 'targetAttribute' => ['idforma_pagamento' => 'idforma_pagamento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpagamento' => 'Idpagamento',
            'vencimento' => 'Vencimento',
            'idforma_pagamento' => 'Idforma Pagamento',
            'idcliente' => 'Idcliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcliente0()
    {
        return $this->hasOne(Clientes::className(), ['idcliente' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdformaPagamento()
    {
        return $this->hasOne(FormasPagamento::className(), ['idforma_pagamento' => 'idforma_pagamento']);
    }
}
