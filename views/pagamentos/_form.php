<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;

/**
 * @var yii\web\View $this
 * @var app\models\Pagamentos $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="pagamentos-form">

    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'vencimento' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(), 'options' => ['type' => DateControl::FORMAT_DATE]],
        ]
    ]);
    echo $form->field($model, 'idforma_pagamento')->widget(Select2::classname(), [
        'data' => $formasPagamento,
        'options' => ['placeholder' => 'Selecione uma forma de pagamento ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Forma de pagamento');

    echo $form->field($model, 'idcliente')->widget(Select2::classname(), [
        'data' => $clientes,
        'options' => ['placeholder' => 'Selecione um cliente ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Cliente');
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
    ActiveForm::end();
    ?>

</div>
