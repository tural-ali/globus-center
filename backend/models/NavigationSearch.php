<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Navigation;

/**
 * NavigationSearch represents the model behind the search form about `common\models\Navigation`.
 */
class NavigationSearch extends Navigation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parentID', 'postID', 'order'], 'integer'],
            [['defaultTitle'], 'safe'],
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
        $query = Navigation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parentID' => $this->parentID,
            'postID' => $this->postID,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'defaultTitle', $this->defaultTitle]);

        return $dataProvider;
    }
}
