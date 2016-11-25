<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ChangeMember;

/**
 * ChangememebrSearch represents the model behind the search form about `common\models\ChangeMember`.
 */
class ChangememebrSearch extends ChangeMember
{
    public $is_do;
    private static $is_do_arr=[
        1=>"未处理",
        2=>'已处理'
    ];
    public static function getIsdoArr(){
        return static::$is_do_arr;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'area_id', 'create_time', 'is_pass','is_do'], 'integer'],
            [['name', 'pin_id', 'mobile', 'origin_gh', 'work_danwei','is_do'], 'safe'],
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
        $level_id=Yii::$app->user->identity->level_id;
        if($level_id===0){//是admin的话
            $query = ChangeMember::find();
        }else {
            $childs=Level::getAllUnderLevel(Yii::$app->user->identity->level_id);
            $ids=Level::getLevelsArr($childs);
//            $ids[] = Level::getBaseId(Yii::$app->user->identity->level_id);//多余
            $ids[]=Yii::$app->user->identity->level_id;
            $query = ChangeMember::find()->where(['level_id'=>$ids]);
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
            'gender' => $this->gender,
            'area_id' => $this->area_id,
            'create_time' => $this->create_time,
            'is_pass' => $this->is_pass,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pin_id', $this->pin_id])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'origin_gh', $this->origin_gh])
            ->andFilterWhere(['like', 'work_danwei', $this->work_danwei])->orderBy(['id'=>SORT_DESC]);
        if($this->is_do==1){
            $query->andFilterWhere(['not in','id',LevelChange::getIsDoIds(Yii::$app->user->identity->level_id)])->orderBy(['id'=>SORT_DESC]);
        }else if($this->is_do==2){
            $query->andFilterWhere(['in','id',LevelChange::getIsDoIds(Yii::$app->user->identity->level_id)])->orderBy(['id'=>SORT_DESC]);
        }


        return $dataProvider;
    }
}
