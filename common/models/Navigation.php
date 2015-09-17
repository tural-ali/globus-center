<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use common\models\NavigationTranslation;
use common\models\NavigationQuery;
use Yii;

/**
 * This is the model class for table "Navigation".
 *
 * @property integer $id
 * @property integer $parentID
 * @property integer $postID
 * @property integer $order
 * @property string $defaultTitle
 *
 * @property Navigation $parent
 * @property Navigation[] $navigations
 * @property Post $post
 * @property NavigationTranslation[] $navigationTranslations
 */
class Navigation extends \yii\db\ActiveRecord
{


    public $title, $language, $url;

    public static function find()
    {
        return new NavigationQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'url'],
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
        return $this->hasMany(NavigationTranslation::className(), ['navigationID' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Navigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentID', 'postID', 'order'], 'integer'],
            [['defaultTitle', 'title', 'url'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentID' => 'Parent',
            'postID' => 'Post',
            'order' => 'Order',
            'defaultTitle' => 'Title',
            'language' => 'Language'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Navigation::className(), ['id' => 'parentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNavigations()
    {
        return $this->hasMany(Navigation::className(), ['parentID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'postID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNavigationTranslations()
    {
        return $this->hasMany(NavigationTranslation::className(), ['navigationID' => 'id']);
    }
}
