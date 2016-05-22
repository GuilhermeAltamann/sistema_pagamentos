<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pagamentos $model
 */

$this->title = 'Create Pagamentos';
$this->params['breadcrumbs'][] = ['label' => 'Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagamentos-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'formasPagamento' => $formasPagamento,
        'clientes' => $clientes
    ]) ?>

</div>
