<?php

namespace common\models;

use Yii;
use creocoder\translateable\TranslateableBehavior;

/**
 * This is the model class for table "Blueprint".
 *
 * @property integer $id
 * @property string $imgUrl
 */
class Blueprint extends \yii\db\ActiveRecord
{


    public $language, $title, $description;

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'description'],
                // translationRelation => 'translations',
                // translationLanguageAttribute => 'language',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function getTranslations()
    {
        return $this->hasMany(BlueprintTranslation::className(), ['blueprintID' => 'id']);
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Blueprint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imgUrl', 'defaultTitle', 'title', 'language', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imgUrl' => 'Img Url',
            'defaultTitle' => 'Title'
        ];
    }
}
