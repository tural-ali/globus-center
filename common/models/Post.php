<?php

namespace common\models;

use Yii;
use creocoder\translateable\TranslateableBehavior;

/**
 * This is the model class for table "Post".
 *
 * @property integer $id
 * @property integer $galleryID
 * @property integer $youtubeID
 * @property integer $type
 * @property string $imgUrl
 * @property integer $publish
 * @property string $createdAt
 * @property string $defaultTitle
 *
 * @property Navigation[] $navigations
 * @property PostTranslation[] $postTranslations
 */
class Post extends \yii\db\ActiveRecord
{
    public $title, $language, $preview, $body;
    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'body', 'preview', 'slug'],
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
        return $this->hasMany(PostTranslation::className(), ['postID' => 'id']);
    }

    public static function tableName()
    {
        return 'Post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['galleryID', 'type', 'publish'], 'integer'],
            [['createdAt'], 'safe'],
            [['imgUrl', 'defaultTitle', 'language', 'youtubeID','title'], 'string', 'max' => 255],
            [['preview', 'body'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'galleryID' => 'Gallery',
            'youtubeID' => 'Youtube Link',
            'type' => 'Type',
            'imgUrl' => 'Main Photo',
            'publish' => 'Publish',
            'createdAt' => 'Created At',
            'defaultTitle' => 'Title',
        ];
    }

    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'galleryID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNavigations()
    {
        return $this->hasMany(Navigation::className(), ['postID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTranslations()
    {
        return $this->hasMany(PostTranslation::className(), ['postID' => 'id']);
    }

}
