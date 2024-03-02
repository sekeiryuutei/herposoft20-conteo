<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $id
 * @property string $idProveedor
 * @property string $nit
 * @property string $razonSocial
 * @property string|null $tipoIdentificacion
 * @property string|null $sucursal
 * @property string|null $descripcionSucursal
 * @property string|null $contacto
 * @property string|null $direccion
 * @property string|null $pais
 * @property string|null $ciudad
 * @property string|null $departamento
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $celular
 * @property string|null $criterioMercancia
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 *
 * @property Ordendecompra[] $ordendecompras
 * @property Transportadora[] $transportadoras
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProveedor', 'nit', 'razonSocial'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['idProveedor', 'nit', 'tipoIdentificacion'], 'string', 'max' => 20],
            [['razonSocial', 'descripcionSucursal', 'contacto', 'direccion', 'email'], 'string', 'max' => 250],
            [['sucursal'], 'string', 'max' => 5],
            [['pais', 'ciudad', 'departamento', 'telefono', 'celular', 'criterioMercancia'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProveedor' => 'Id Proveedor',
            'nit' => 'Nit',
            'razonSocial' => 'Razon Social',
            'tipoIdentificacion' => 'Tipo Identificacion',
            'sucursal' => 'Sucursal',
            'descripcionSucursal' => 'Descripcion Sucursal',
            'contacto' => 'Contacto',
            'direccion' => 'Direccion',
            'pais' => 'Pais',
            'ciudad' => 'Ciudad',
            'departamento' => 'Departamento',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'celular' => 'Celular',
            'criterioMercancia' => 'Criterio Mercancia',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Ordendecompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdendecompras()
    {
        return $this->hasMany(Ordendecompra::class, ['idProveedor' => 'id']);
    }

    /**
     * Gets query for [[Transportadoras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransportadoras()
    {
        return $this->hasMany(Transportadora::class, ['idProveedor' => 'id']);
    }
}
