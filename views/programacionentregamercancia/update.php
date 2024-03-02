<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programacionentregamercancia $model */

$this->title = 'Update Programacionentregamercancia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ordenes de Compra', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Registrar';
?>
<div class="programacionentregamercancia-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelprogramacion' => $modelprogramacion
    ]) ?>

</div>
