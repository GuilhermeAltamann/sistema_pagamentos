<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $idcliente
 * @property string $nome
 * @property string $email
 *
 * @property Pagamentos[] $pagamentos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email'], 'required'],
            [['nome', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => 'Idcliente',
            'nome' => 'Nome',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamentos::className(), ['clientes_idcliente' => 'idcliente']);
    }
    
    public function trazClientesNaoPagaram(){
        
        return Yii::$app->db->createCommand('SELECT *  
                                             FROM clientes CLI
                                             WHERE NOT EXISTS (
                                                SELECT * 
                                                FROM pagamentos PAG
                                                WHERE PAG.idcliente = CLI.idcliente)')
                ->queryAll();
    }
}
