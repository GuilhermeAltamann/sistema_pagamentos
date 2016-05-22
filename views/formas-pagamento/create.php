<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\FormasPagamento $model
 */

$this->title = 'Create Formas Pagamento';
$this->params['breadcrumbs'][] = ['label' => 'Formas Pagamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formas-pagamento-create">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
