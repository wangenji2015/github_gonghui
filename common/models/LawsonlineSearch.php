<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LawsOnline;

/**
 * LawsonlineSearch represents the model behind the search form about `common\models\LawsOnline`.
 */
class LawsonlineSearch extends LawsOnline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gh_user_id', 'lawyer_id', 'create_time', 'reply_time'], 'integer'],
            [['gh_user_name', 'gh_user_mobile', 'content', 'relpy'], 'safe'],
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
        $lawyer_id=Yii::$app->user->identity->lawyer_id;
        $other_level=Yii::$app->user->identity->other_level;
        $level = Yii::$app->user->identity->level_id;
        if($other_level==1 || $level===0 || $level===1){
            $query = LawsOnline::find();
        }else if($lawyer_id && $other_level!==0){
            $query = LawsOnline::find()->where(['lawyer_id'=>$lawyer_id]);
        }else {
            $query = LawsOnline::find()->where(['id'=>0]);
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
            'gh_user_id' => $this->gh_user_id,
            'lawyer_id' => $this->lawyer_id,
            'create_time' => $this->create_time,
            'reply_time' => $this->reply_time,
        ]);

        $query->andFilterWhere(['like', 'gh_user_name', $this->gh_user_name])
            ->andFilterWhere(['like', 'gh_user_mobile', $this->gh_user_mobile])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'relpy', $this->relpy]);

        return $dataProvider;
    }
}
