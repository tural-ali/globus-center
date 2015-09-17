<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NavigationTranslation;

/**
 * NavigationTranslationSearch represents the model behind the search form about `common\models\NavigationTranslation`.
 */
class NavigationTranslationSearch extends NavigationTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'navigationID'], 'integer'],
            [['language', 'url', 'title'], 'safe'],
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
        $query = NavigationTranslation::find();

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
            'navigationID' => $this->navigationID,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
