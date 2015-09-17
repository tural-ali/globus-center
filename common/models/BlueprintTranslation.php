<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "BlueprintTranslation".
 *
 * @property integer $id
 * @property integer $blueprintID
 * @property string $language
 * @property string $title
 * @property string $description
 *
 * @property Blueprint $blueprint
 */
class BlueprintTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'BlueprintTranslation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blueprintID'], 'integer'],
            [['language'], 'string', 'max' => 2],
            [['title', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blueprintID' => 'Blueprint ID',
            'language' => 'Language',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlueprint()
    {
        return $this->hasOne(Blueprint::className(), ['id' => 'blueprintID']);
    }
}
