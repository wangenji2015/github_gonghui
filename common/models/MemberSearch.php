<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Member;
use common\models\LevelMember;

/**
 * MemberSearch represents the model behind the search form about `common\models\Member`.
 */
class MemberSearch extends Member
{
    public $is_do;

    private static $is_do_arr=[
        1=>'未处理',
        2=>'已处理',
    ];
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'level_id', 'station', 'area_id','is_do'], 'integer'],
            [['name', 'pin_id', 'mobile', 'work_danwei','is_do'], 'safe'],
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
    public static function isDoArr(){
        return static::$is_do_arr;
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


        // add conditions that should always apply here


        $level_id=Yii::$app->user->identity->level_id;
        if($level_id===0){//是admin的话
            $query = Member::find();
        }else {
            $childs=Level::getAllUnderLevel(Yii::$app->user->identity->level_id);
            $ids=Level::getLevelsArr($childs);
            $ids[] = Level::getBaseId(Yii::$app->user->identity->level_id);
            $query = Member::find()->where(['level_id'=>$ids]);
        }
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20
                ]
            ]
        );

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
//            'level_id' => $this->level_id,
            'station' => $this->station,
            'area_id' => $this->area_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pin_id', $this->pin_id])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'work_danwei', $this->work_danwei])->orderBy(['id'=>SORT_DESC]);
//        var_dump(LevelMember::getIsdoId(Yii::$app->user->identity->level_id));
        if($this->is_do == 2){
            $query->andFilterWhere(['in','id',LevelMember::getIsdoId(Yii::$app->user->identity->level_id)])->orderBy(['id'=>SORT_DESC]);
        }else if($this->is_do == 1){
            $query->andFilterWhere(['not in','id',LevelMember::getIsdoId(Yii::$app->user->identity->level_id)])->orderBy(['id'=>SORT_DESC]);
        }

        return $dataProvider;
    }

}
