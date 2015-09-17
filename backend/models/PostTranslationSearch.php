<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PostTranslation;

/**
 * PostTranslationSearch represents the model behind the search form about `common\models\PostTranslation`.
 */
class PostTranslationSearch extends PostTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postID'], 'integer'],
            [['language', 'title', 'body', 'preview', 'slug'], 'safe'],
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
        $query = PostTranslation::find();

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
            'postID' => $this->postID,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'preview', $this->preview])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
