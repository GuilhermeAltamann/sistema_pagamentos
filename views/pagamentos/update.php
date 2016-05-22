<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pagamentos $model
 */

$this->title = 'Update Pagamentos: ' . ' ' . $model->idpagamento;
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpagamento, 'url' => ['view', 'id' => $model->idpagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagamentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'formasPagamento' => $formasPagamento,
        'clientes' => $clientes
    ]) ?>

</div>
