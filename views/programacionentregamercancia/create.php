<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programacionentregamercancia $model */

$this->title = 'Create Programacionentregamercancia';
$this->params['breadcrumbs'][] = ['label' => 'Programacionentregamercancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programacionentregamercancia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
