<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mysay;

/**
 * MysaySearch represents the model behind the search form about `common\models\Mysay`.
 */
class MysaySearch extends Mysay
{
    /**
     * @inheritdoc
     */
    public $is_reply;
    private static $reply_arr=[
        1=>"未回复",
        2=>"已回复"
    ];
    public static function get_is_reply(){
        return static::$reply_arr;
    }
    public function rules()
    {
        return [
            [['id', 'user_id', 'level_id', 'type', 'create_time', 'reply_time', 'is_public','is_reply'], 'integer'],
            [['user_name', 'mobile', 'title', 'address', 'unit', 'question', 'reply'], 'safe'],
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

        $level=Yii::$app->user->identity->level_id;
        $mysay_level=Yii::$app->user->identity->mysay_level;
        if($level===1 || $mysay_level===1){
            $query = Mysay::find();
        }else {
            $query = Mysay::find()->where(['level_id'=>$mysay_level]);
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
            'user_id' => $this->user_id,
            'level_id' => $this->level_id,
            'type' => $this->type,
            'create_time' => $this->create_time,
            'reply_time' => $this->reply_time,
            'is_public' => $this->is_public,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'question', $this->question])->orderBy(['id'=>SORT_DESC]);
            $str="";
            if($this->is_reply==1){
                $query->andWhere("reply=''")->orderBy(['id'=>SORT_DESC]);
            }else if($this->is_reply==2){
                $query->andWhere("reply<>''")->orderBy(['id'=>SORT_DESC]);
            }

        return $dataProvider;
    }
}
