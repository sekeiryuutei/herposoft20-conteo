<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $id
 * @property float $item
 * @property string $referencia
 * @property string $descripcion
 * @property int $idCategoria
 * @property int $idSubcategoria
 * @property int|null $idProducto
 * @property int|null $idMarca
 * @property int|null $idTalla
 * @property int|null $idColor
 * @property string|null $codigoProveedor
 * @property string|null $nombreProveedor
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Conteoentregamercancia[] $conteoentregamercancias
 * @property Color $idColor0
 * @property Marca $idMarca0
 * @property Producto $idProducto0
 * @property Talla $idTalla0
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item', 'referencia', 'descripcion', 'idCategoria', 'idSubcategoria', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['item'], 'number'],
            [['idCategoria', 'idSubcategoria', 'idProducto', 'idMarca', 'idTalla', 'idColor', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['referencia'], 'string', 'max' => 50],
            [['descripcion', 'nombreProveedor'], 'string', 'max' => 150],
            [['codigoProveedor'], 'string', 'max' => 10],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['idProducto' => 'id']],
            [['idMarca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::class, 'targetAttribute' => ['idMarca' => 'id']],
            [['idTalla'], 'exist', 'skipOnError' => true, 'targetClass' => Talla::class, 'targetAttribute' => ['idTalla' => 'id']],
            [['idColor'], 'exist', 'skipOnError' => true, 'targetClass' => Color::class, 'targetAttribute' => ['idColor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Item',
            'referencia' => 'Referencia',
            'descripcion' => 'Descripcion',
            'idCategoria' => 'Id Categoria',
            'idSubcategoria' => 'Id Subcategoria',
            'idProducto' => 'Id Producto',
            'idMarca' => 'Id Marca',
            'idTalla' => 'Id Talla',
            'idColor' => 'Id Color',
            'codigoProveedor' => 'Codigo Proveedor',
            'nombreProveedor' => 'Nombre Proveedor',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Conteoentregamercancias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConteoentregamercancias()
    {
        return $this->hasMany(Conteoentregamercancia::class, ['idItem' => 'id']);
    }

    /**
     * Gets query for [[IdColor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdColor0()
    {
        return $this->hasOne(Color::class, ['id' => 'idColor']);
    }

    /**
     * Gets query for [[IdMarca0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca0()
    {
        return $this->hasOne(Marca::class, ['id' => 'idMarca']);
    }

    /**
     * Gets query for [[IdProducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto0()
    {
        return $this->hasOne(Producto::class, ['id' => 'idProducto']);
    }

    /**
     * Gets query for [[IdTalla0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTalla0()
    {
        return $this->hasOne(Talla::class, ['id' => 'idTalla']);
    }
}
