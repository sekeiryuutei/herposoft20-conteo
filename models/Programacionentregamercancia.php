<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "programacionentregamercancia".
 *
 * @property int $id
 * @property int $idAgendaEntregaMercancia
 * @property int $idEmpleadoLogistica
 * @property int $idEstado
 * @property int|null $unidadesConteo
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Agendaentregamercancia $agendaEntregaMercancia
 * @property Empleadologistica $empleadoLogistica
 */
class Programacionentregamercancia extends \yii\db\ActiveRecord
{
    public $numeroOrdenCompra;
    public $razonSocial;
    public $fechaCita;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programacionentregamercancia';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('GETDATE()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
                'value' => function ($event) {
                    return Yii::$app->user->id;
                },
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAgendaEntregaMercancia', 'idEmpleadoLogistica', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['idAgendaEntregaMercancia', 'idEmpleadoLogistica', 'idEstado', 'unidadesConteo', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['idAgendaEntregaMercancia'], 'exist', 'skipOnError' => true, 'targetClass' => Agendaentregamercancia::class, 'targetAttribute' => ['idAgendaEntregaMercancia' => 'id']],
            [['idEmpleadoLogistica'], 'exist', 'skipOnError' => true, 'targetClass' => Empleadologistica::class, 'targetAttribute' => ['idEmpleadoLogistica' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idAgendaEntregaMercancia' => 'Id Agenda Entrega Mercancia',
            'idEmpleadoLogistica' => 'Id Empleado Logistica',
            'idEstado' => 'Id Estado',
            'unidadesConteo' => 'Unidades Conteo',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'numeroOrdenCompra' => 'Orden de Compra'
        ];
    }

    /**
     * Gets query for [[AgendaEntregaMercancia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendaEntregaMercancia()
    {
        return $this->hasOne(Agendaentregamercancia::class, ['id' => 'idAgendaEntregaMercancia']);
    }

    /**
     * Gets query for [[EmpleadoLogistica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleadoLogistica()
    {
        return $this->hasOne(Empleadologistica::class, ['id' => 'idEmpleadoLogistica']);
    }
}
