<?php

namespace common\models;

use Yii;
use common\behaviors\SluggableBehavior;

/**
 * This is the model class for table "GalleryTranslation".
 *
 * @property integer $id
 * @property integer $galleryID
 * @property string $language
 * @property string $title
 * @property string $slug
 *
 * @property Gallery $gallery
 */
class GalleryTranslation extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'GalleryTranslation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['galleryID', 'language', 'title'], 'required'],
            [['galleryID'], 'integer'],
            [['language'], 'string', 'max' => 2],
            [['title', 'slug'], 'string', 'max' => 255],
            [['galleryID', 'language'], 'unique', 'targetAttribute' => ['galleryID', 'language'], 'message' => 'The combination of Gallery ID and Language has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'galleryID' => 'Gallery ID',
            'language' => 'Language',
            'title' => 'Title',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'galleryID']);
    }
}
