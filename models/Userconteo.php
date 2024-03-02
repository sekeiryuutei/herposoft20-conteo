<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userconteo".
 *
 * @property int $id
 * @property int $idUser
 * @property int $idEmpleadoLogistica
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Empleadologistica $empleadoLogistica
 * @property User $idUser0
 */
class Userconteo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userconteo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser', 'idEmpleadoLogistica', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['idUser', 'idEmpleadoLogistica', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
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
            'idUser' => 'Id User',
            'idEmpleadoLogistica' => 'Id Empleado Logistica',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
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

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }
}
