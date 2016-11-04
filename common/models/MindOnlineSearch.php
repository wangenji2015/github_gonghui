<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MindOnline;

/**
 * MindOnlineSearch represents the model behind the search form about `common\models\MindOnline`.
 */
class MindOnlineSearch extends MindOnline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gh_user_id', 'minder_id', 'create_time', 'reply_time', 'is_public'], 'integer'],
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
        $other_level=Yii::$app->user->identity->other_level;
        $minder_id=Yii::$app->user->identity->minder_id;
        $level=Yii::$app->user->identity->level_id;
        if($other_level === 2 || $level===1 || $level===0){
            $query = MindOnline::find();
        }else if($minder_id && $other_level !==2){
            $query = MindOnline::find()->where(['minder_id'=>$minder_id]);
        }else {
            $query = MindOnline::find()->where(['id'=>0]);
        }
//        $query = MindOnline::find();

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
            'minder_id' => $this->minder_id,
            'create_time' => $this->create_time,
            'reply_time' => $this->reply_time,
            'is_public' => $this->is_public,
        ]);

        $query->andFilterWhere(['like', 'gh_user_name', $this->gh_user_name])
            ->andFilterWhere(['like', 'gh_user_mobile', $this->gh_user_mobile])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'relpy', $this->relpy]);

        return $dataProvider;
    }
}
