<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programacionentregamercancia;

/**
 * ProgramacionentregamercanciaSearch represents the model behind the search form of `app\models\Programacionentregamercancia`.
 */
class ProgramacionentregamercanciaSearch extends Programacionentregamercancia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idAgendaEntregaMercancia', 'idEmpleadoLogistica', 'idEstado', 'puedeModificarEntrada', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Programacionentregamercancia::find()->alias('pr');
        $query->join('INNER JOIN', 'agendaentregamercancia ag', 'pr.idAgendaEntregaMercancia = ag.id');
        $query->join('INNER JOIN', 'empleadologistica eml', 'pr.idEmpleadoLogistica = eml.id');
        $query->join('INNER JOIN', 'userconteo usc', 'eml.id = usc. idEmpleadoLogistica');
        $query->join('INNER JOIN', 'ordendecompra oc', 'ag.idOrdenCompra = oc.id');
        $query->join('INNER JOIN', 'proveedor prv', 'oc.idProveedor = prv.id');
        $query->join('INNER JOIN', 'tipodocumento tpo', 'oc.idTipoDocumento = tpo.id');
        $query->join('INNER JOIN', 'centrooperacion cop', 'oc.idCO = cop.id');
        $query->join('LEFT JOIN', 'transportadora tr', 'ag.idTransportadora = tr.id');

        $query->select([
            "cop.codigo + '-' + tpo.codigo + '-' + CONVERT(VARCHAR(10), oc.consecutivo) AS numeroOrdenCompra",
            'prv.razonSocial',
            'ag.fechaCita',
            'pr.idAgendaEntregaMercancia',
            'pr.id AS idProgramacionEntregaMercancia',
            'tr.nombre AS nombreTransportadora',
            'pr.id'
        ]);

        if (Yii::$app->user->id){
            $query->andWhere(['=', 'usc.idUser', Yii::$app->user->id])
                    ->andWhere(['=', 'ag.idEstado', 9])
                    ->andWhere(['=', 'pr.idEstado', 5]);  
        }
            
        $query->orderBy(['ag.fechaCita' => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'idAgendaEntregaMercancia' => $this->idAgendaEntregaMercancia,
            'idEmpleadoLogistica' => $this->idEmpleadoLogistica,
            'idEstado' => $this->idEstado,
            'puedeModificarEntrada' => $this->puedeModificarEntrada,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);*/

        return $dataProvider;
    }
}
