<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conteoentregamercancia".
 *
 * @property int $id
 * @property int $idProgramacionEntregaMercancia
 * @property int $unidadesConteo
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Conteoentregamercancia extends \yii\db\ActiveRecord
{
    public $item;
    public $numeroOrdenCompra;
    public $nombreProveedor;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conteoentregamercancia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProgramacionEntregaMercancia', 'unidadesConteo', 'item'], 'required', 'message' => 'Campo Obligatorio'],
            [['idProgramacionEntregaMercancia', 'unidadesConteo', 'created_by', 'updated_by', 
            'idItem', 'item'], 'integer'],
            [['item'] , 'number'],
            [['created_at', 'updated_at'], 'safe'],
            ['item', 'validateItem'],
        ];
    }

    public function validateItem($attribute, $params)
    {
        $item = Item::find()->where(['item' => intval($this->item)])->one();
        if (!$item) {
            $this->addError($attribute, 'Este Item no existe.');
            return;
        }

        // Verifica si el código del item pertenece a la orden de compra
        $itemorden = Conteoentregamercancia::find()->where(['idProgramacionEntregaMercancia' => $this->idProgramacionEntregaMercancia, 'idItem' => $item->id])->one();
        if (!$itemorden) {
            $this->addError($attribute, 'El código del item no pertenece a la orden de compra especificada.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProgramacionEntregaMercancia' => 'Id Programacion Entrega Mercancia',
            'unidadesConteo' => 'Unidades Conteo',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'Referencia' => 'Item',
            'idItem' => 'Item'

        ];
    }
}
