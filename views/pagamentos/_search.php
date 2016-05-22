<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\PagamentosSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="pagamentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpagamento') ?>

    <?= $form->field($model, 'vencimento') ?>

    <?= $form->field($model, 'idforma_pagamento') ?>

    <?= $form->field($model, 'idcliente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
