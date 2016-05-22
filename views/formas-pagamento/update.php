<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\FormasPagamento $model
 */

$this->title = 'Update Formas Pagamento: ' . ' ' . $model->idforma_pagamento;
$this->params['breadcrumbs'][] = ['label' => 'Formas Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idforma_pagamento, 'url' => ['view', 'id' => $model->idforma_pagamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formas-pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
