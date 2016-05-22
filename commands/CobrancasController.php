<?php

namespace app\commands;

use yii\console\Controller;

class CobrancasController extends Controller{
    
    public function actionIndex(){
        
        $clientes = new \app\models\Clientes();
        $cobrarClientes = $clientes->trazClientesNaoPagaram();
        
        foreach ($cobrarClientes as $cliente){
            Yii::$app->mailer->compose()
                ->setTo($cliente->email)
                ->setFrom(['my@gmail.com' => 'name'])
                ->setSubject('cobrança')
                ->setTextBody('email teste cobranca')
                ->send();
        }
        
        
    }
    
}
