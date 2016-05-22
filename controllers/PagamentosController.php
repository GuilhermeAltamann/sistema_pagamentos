<?php

namespace app\controllers;

use Yii;
use app\models\Pagamentos;
use app\models\PagamentosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PagamentosController implements the CRUD actions for Pagamentos model.
 */
class PagamentosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pagamentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagamentosSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Pagamentos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpagamento]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new Pagamentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagamentos;
        
        $selectClientes = $this->findClientes();
        $selectFormasPagamento = $this->findFormasPagamento();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpagamento]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'formasPagamento' => $selectFormasPagamento,
                'clientes' => $selectClientes
            ]);
        }
    }

    /**
     * Updates an existing Pagamentos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $selectClientes = $this->findClientes();
        $selectFormasPagamento = $this->findFormasPagamento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpagamento]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'formasPagamento' => $selectFormasPagamento,
                'clientes' => $selectClientes
            ]);
        }
    }

    /**
     * Deletes an existing Pagamentos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pagamentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pagamentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        
        if (($model = Pagamentos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    private function findClientes(){
        
        $clientes = \app\models\Clientes::find()->all();
        
        $aryClientes = [];
        
        foreach ($clientes as $cliente){
            $aryClientes[$cliente->idcliente] = $cliente->nome;
        }
        
        return $aryClientes;
        
    }
    
    private function findFormasPagamento(){
        
        $formas = \app\models\FormasPagamento::find()->all();
        
        $aryFormas = [];
        
        foreach ($formas as $forma){
            $aryFormas[$forma->idforma_pagamento] = $forma->nome;
        }
        
        return $aryFormas;
        
    }
    
}
