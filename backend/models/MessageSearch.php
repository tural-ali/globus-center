<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Message;

/**
 * MessageSearch represents the model behind the search form about `backend\models\Message`.
 */
class MessageSearch extends Message
{
    public $messageText, $messageCat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['language', 'translation', 'messageText', 'messageCat'], 'safe'],
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
        $query = Message::find();
        $query->joinWith(['id0']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC, 'language' => SORT_DESC]]
        ]);

        $dataProvider->sort->attributes['messageText'] = [
            'asc' => ['TranslationSourceMessage.message' => SORT_ASC],
            'desc' => ['TranslationSourceMessage.message' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['messageCat'] = [
            'asc' => ['TranslationSourceMessage.category' => SORT_ASC],
            'desc' => ['TranslationSourceMessage.category' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'translation', $this->translation])
            ->andFilterWhere(['like', 'TranslationSourceMessage.message', $this->messageText])
            ->andFilterWhere(['like', 'TranslationSourceMessage.category', $this->messageCat]);

        return $dataProvider;
    }


}
