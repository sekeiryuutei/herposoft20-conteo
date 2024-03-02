<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agendaentregamercancia".
 *
 * @property int $id
 * @property int $idAgenda
 * @property int $idOrdenCompra
 * @property string|null $fechaCita
 * @property float|null $unidades
 * @property int|null $numeroCajas
 * @property int|null $idTransportadora
 * @property string|null $contacto
 * @property string|null $fechaContacto
 * @property string|null $numeroGuia
 * @property string|null $observacion
 * @property int $idEstado
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Agendapresupuesto $idAgenda0
 * @property Estadoagenda $idEstado0
 * @property Ordendecompra $ordenCompra
 * @property Transportadora $idTransportadora0
 * @property Programacionentregamercancia[] $programacionentregamercancias
 */
class Agendaentregamercancia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agendaentregamercancia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAgenda', 'idOrdenCompra', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['idAgenda', 'idOrdenCompra', 'numeroCajas', 'idTransportadora', 'idEstado', 'created_by', 'updated_by'], 'integer'],
            [['fechaCita', 'fechaContacto', 'created_at', 'updated_at'], 'safe'],
            [['unidades'], 'number'],
            [['contacto'], 'string', 'max' => 150],
            [['numeroGuia'], 'string', 'max' => 20],
            [['observacion'], 'string', 'max' => 500],
            [['idAgenda'], 'exist', 'skipOnError' => true, 'targetClass' => Agendapresupuesto::class, 'targetAttribute' => ['idAgenda' => 'id']],
            [['idOrdenCompra'], 'exist', 'skipOnError' => true, 'targetClass' => Ordendecompra::class, 'targetAttribute' => ['idOrdenCompra' => 'id']],
            [['idTransportadora'], 'exist', 'skipOnError' => true, 'targetClass' => Transportadora::class, 'targetAttribute' => ['idTransportadora' => 'id']],
            [['idEstado'], 'exist', 'skipOnError' => true, 'targetClass' => Estadoagenda::class, 'targetAttribute' => ['idEstado' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAgenda' => 'Id Agenda',
            'idOrdenCompra' => 'Id Orden Compra',
            'fechaCita' => 'Fecha Cita',
            'unidades' => 'Unidades',
            'numeroCajas' => 'Numero Cajas',
            'idTransportadora' => 'Id Transportadora',
            'contacto' => 'Contacto',
            'fechaContacto' => 'Fecha Contacto',
            'numeroGuia' => 'Numero Guia',
            'observacion' => 'Observacion',
            'idEstado' => 'Id Estado',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[IdAgenda0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAgenda0()
    {
        return $this->hasOne(Agendapresupuesto::class, ['id' => 'idAgenda']);
    }

    /**
     * Gets query for [[IdEstado0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado0()
    {
        return $this->hasOne(Estadoagenda::class, ['id' => 'idEstado']);
    }

    /**
     * Gets query for [[OrdenCompra]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenCompra()
    {
        return $this->hasOne(Ordendecompra::class, ['id' => 'idOrdenCompra']);
    }

    /**
     * Gets query for [[IdTransportadora0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTransportadora0()
    {
        return $this->hasOne(Transportadora::class, ['id' => 'idTransportadora']);
    }

    /**
     * Gets query for [[Programacionentregamercancias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionentregamercancias()
    {
        return $this->hasMany(Programacionentregamercancia::class, ['idAgendaEntregaMercancia' => 'id']);
    }
}
