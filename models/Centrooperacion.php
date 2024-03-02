<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "centrooperacion".
 *
 * @property int $id
 * @property string|null $codigo
 * @property string|null $nombre
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Empleado[] $empleados
 * @property Horasextras[] $horasextras
 * @property Ordendecompra[] $ordendecompras
 */
class Centrooperacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'centrooperacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['codigo'], 'string', 'max' => 5],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Empleados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::class, ['idCO' => 'id']);
    }

    /**
     * Gets query for [[Horasextras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorasextras()
    {
        return $this->hasMany(Horasextras::class, ['idCO' => 'id']);
    }

    /**
     * Gets query for [[Ordendecompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecompras()
    {
        return $this->hasMany(Ordendecompra::class, ['idCO' => 'id']);
    }
}
