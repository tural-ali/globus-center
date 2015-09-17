<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'galleryID', 'youtubeID', 'type', 'publish'], 'integer'],
            [['imgUrl', 'createdAt', 'defaultTitle'], 'safe'],
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
        $query = Post::find();

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
            'galleryID' => $this->galleryID,
            'youtubeID' => $this->youtubeID,
            'type' => $this->type,
            'publish' => $this->publish,
            'createdAt' => $this->createdAt,
        ]);

        $query->andFilterWhere(['like', 'imgUrl', $this->imgUrl])
            ->andFilterWhere(['like', 'defaultTitle', $this->defaultTitle]);

        return $dataProvider;
    }
}
