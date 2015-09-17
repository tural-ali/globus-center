<?php

namespace common\models;

use Yii;
use creocoder\translateable\TranslateableBehavior;

/**
 * This is the model class for table "Gallery".
 *
 * @property integer $id
 * @property string $createdAt
 * @property integer $withContentOnly
 * @property string $imgUrl
 * @property string $defaultTitle
 *
 * @property GalleryMedia[] $galleryMedia
 * @property GalleryTranslation[] $galleryTranslations
 */
class Gallery extends \yii\db\ActiveRecord
{

    public $title, $language;

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title', 'slug'],
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
        return $this->hasMany(GalleryTranslation::className(), ['galleryID' => 'id']);
    }

    public static function tableName()
    {
        return 'Gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdAt'], 'safe'],
            [['withContentOnly'], 'integer'],
            [['imgUrl', 'defaultTitle', 'title'], 'string', 'max' => 255],
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
            'createdAt' => 'Created At',
            'withContentOnly' => 'With Content Only',
            'imgUrl' => 'Img Url',
            'defaultTitle' => 'Title',
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['galleryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryMedia()
    {
        return $this->hasMany(GalleryMedia::className(), ['galleryID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryTranslations()
    {
        return $this->hasMany(GalleryTranslation::className(), ['galleryID' => 'id']);
    }
}
