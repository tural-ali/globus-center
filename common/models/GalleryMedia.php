<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "GalleryMedia".
 *
 * @property integer $id
 * @property integer $type
 * @property string $url
 * @property integer $galleryID
 * @property integer $default
 *
 * @property Gallery $gallery
 */
class GalleryMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'GalleryMedia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'galleryID', 'default'], 'integer'],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'url' => 'Url',
            'galleryID' => 'Gallery ID',
            'default' => 'Default',
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
