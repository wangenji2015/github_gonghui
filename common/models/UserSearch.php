<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email'], 'safe'],
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
        $childs=Level::getUnderLevel(Yii::$app->user->identity->level_id);
        $ids=Level::getUnderLevelIds($childs);
        $level_id=Yii::$app->user->identity->level_id;
        $other_level=Yii::$app->user->identity->other_level;
        $lawyer_id= Yii::$app->user->identity->lawyer_id;
        $minder_id =Yii::$app->user->identity->minder_id;
        $id=Yii::$app->user->identity->getId();
        if($level_id===1 || $level_id===0){
            $query = User::find();
        }else if($other_level ===1){
            $query = User::find()->where(['!=','lawyer_id',''])
                ->orWhere(['id'=>$id]);
        }else if($other_level===2){
            $query = User::find()->where(['!=','minder_id',''])
                ->orWhere(['id'=>$id]);
        }else if($level_id!==1 && $level_id!==0){
            $query = User::find()->where(['level_id'=>$ids])
                ->orWhere(['id'=>$id]);
        }else {
            $query = User::find()->where(['id'=>$id]);
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
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
