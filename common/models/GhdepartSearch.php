<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\GhDepart;

/**
 * GhdepartSearch represents the model behind the search form about `common\models\GhDepart`.
 */
class GhdepartSearch extends GhDepart
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id'], 'integer'],
            [['name', 'depart_key'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $parent_id=Yii::$app->request->get("parent_id");
        $level_id=Yii::$app->user->identity->level_id;
        $level=Level::find()->where(['id'=>$level_id])->asArray()->one();
        if($parent_id){
            $query=GhDepart::find()->where(['parent_id'=>$parent_id]);
        }else if($level['depart_id']==73){
            $query=GhDepart::find()->where(['parent_id'=>$level['depart_id']]);
        }else {
            $query = GhDepart::find()->where(['id'=>$level['depart_id']]);
        }


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
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'depart_key', $this->depart_key]);

        return $dataProvider;
    }
}
