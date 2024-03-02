<?php

$this->registerCss('
    .btn-create {
        width: 300px;
    }
    
    .centrar {
        text-align: center;
    }

    #item:focus {
        outline: 2px solid blue; /* Cambia el color del contorno cuando está enfocado */
        outline-offset: -2px; /* Ajusta el desplazamiento del contorno para que no cambie el tamaño del campo */
    }
');

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Programacionentregamercancia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="programacionentregamercancia-form">

    <?php $form = ActiveForm::begin([
                    'id' => 'modal-form-programacionentregamercancia'
                ]); ?>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'numeroOrdenCompra')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col-lg-9">
            <?= $form->field($model, 'nombreProveedor')->textInput(['disabled' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'item', ['inputOptions' => ['autofocus' => true, 'class' => 'form-control']])->textInput(['readonly' => false, 'id' => 'item', 'type' => 'number', 'min' => 1, 'step' => 1]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'unidadesConteo')->textInput(['disabled' => true, 'type' => 'number', 'min' => 1, 'step' => 1 , 'id' => 'unidadesconteo']) ?>
        </div>
    </div>

    <div class="form-group centrar">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success btn-lg btn-create']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
