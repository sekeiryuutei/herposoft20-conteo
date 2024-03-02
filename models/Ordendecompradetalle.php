<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordendecompradetalle".
 *
 * @property int $id
 * @property int|null $idOrdenCompra
 * @property int|null $idItem
 * @property int|null $idCategoria
 * @property int|null $idSubcategoria
 * @property float|null $cantidadPedida
 * @property float|null $cantidadEntrada
 * @property float|null $cantidadPendiente
 * @property string|null $fechaEntrega
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Ordendecompra $idOrdenCompra0
 */
class Ordendecompradetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordendecompradetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idOrdenCompra', 'idItem', 'idCategoria', 'idSubcategoria', 'created_by', 'updated_by'], 'integer'],
            [['cantidadPedida', 'cantidadEntrada', 'cantidadPendiente'], 'number'],
            [['fechaEntrega', 'created_at', 'updated_at'], 'safe'],
            [['idOrdenCompra'], 'exist', 'skipOnError' => true, 'targetClass' => Ordendecompra::class, 'targetAttribute' => ['idOrdenCompra' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idOrdenCompra' => 'Id Orden Compra',
            'idItem' => 'Id Item',
            'idCategoria' => 'Id Categoria',
            'idSubcategoria' => 'Id Subcategoria',
            'cantidadPedida' => 'Cantidad Pedida',
            'cantidadEntrada' => 'Cantidad Entrada',
            'cantidadPendiente' => 'Cantidad Pendiente',
            'fechaEntrega' => 'Fecha Entrega',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[IdOrdenCompra0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrdenCompra0()
    {
        return $this->hasOne(Ordendecompra::class, ['id' => 'idOrdenCompra']);
    }
}
