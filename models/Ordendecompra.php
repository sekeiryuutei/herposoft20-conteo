<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordendecompra".
 *
 * @property int $id
 * @property int|null $idCO
 * @property int|null $idTipoDocumento
 * @property float|null $consecutivo
 * @property string|null $fecha
 * @property int|null $idProveedor
 * @property int|null $idEstado
 * @property string|null $fechaEntrega
 * @property float|null $totalCantidadPedida
 * @property float|null $totalCantidadEntrada
 * @property float|null $totalCantidadPendiente
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Agendaentregamercancia[] $agendaentregamercancias
 * @property Centrooperacion $CO
 * @property Proveedor $Proveedor
 * @property Tipodocumento $TipoDocumento
 * @property Ordendecompradetalle[] $ordendecompradetalles
 */
class Ordendecompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordendecompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCO', 'idTipoDocumento', 'idProveedor', 'idEstado', 'created_by', 'updated_by'], 'integer'],
            [['consecutivo', 'totalCantidadPedida', 'totalCantidadEntrada', 'totalCantidadPendiente'], 'number'],
            [['fecha', 'fechaEntrega', 'created_at', 'updated_at'], 'safe'],
            [['idCO'], 'exist', 'skipOnError' => true, 'targetClass' => Centrooperacion::class, 'targetAttribute' => ['idCO' => 'id']],
            [['idTipoDocumento'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodocumento::class, 'targetAttribute' => ['idTipoDocumento' => 'id']],
            [['idProveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::class, 'targetAttribute' => ['idProveedor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCO' => 'Id Co',
            'idTipoDocumento' => 'Id Tipo Documento',
            'consecutivo' => 'Consecutivo',
            'fecha' => 'Fecha',
            'idProveedor' => 'Id Proveedor',
            'idEstado' => 'Id Estado',
            'fechaEntrega' => 'Fecha Entrega',
            'totalCantidadPedida' => 'Total Cantidad Pedida',
            'totalCantidadEntrada' => 'Total Cantidad Entrada',
            'totalCantidadPendiente' => 'Total Cantidad Pendiente',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Agendaentregamercancias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaentregamercancias()
    {
        return $this->hasMany(Agendaentregamercancia::class, ['idOrdenCompra' => 'id']);
    }

    /**
     * Gets query for [[CO]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCO()
    {
        return $this->hasOne(Centrooperacion::class, ['id' => 'idCO']);
    }

    /**
     * Gets query for [[Proveedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProveedor()
    {
        return $this->hasOne(Proveedor::class, ['id' => 'idProveedor']);
    }

    /**
     * Gets query for [[TipoDocumento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(Tipodocumento::class, ['id' => 'idTipoDocumento']);
    }

    /**
     * Gets query for [[Ordendecompradetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecompradetalles()
    {
        return $this->hasMany(Ordendecompradetalle::class, ['idOrdenCompra' => 'id']);
    }
}
