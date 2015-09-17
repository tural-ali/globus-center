<?php

namespace common\models;

use Yii;
use common\behaviors\SluggableBehavior;

/**
 * This is the model class for table "PostTranslation".
 *
 * @property integer $id
 * @property integer $postID
 * @property string $language
 * @property string $title
 * @property string $body
 * @property string $preview
 * @property string $slug
 *
 * @property Post $post
 */
class PostTranslation extends \yii\db\ActiveRecord
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
        return 'PostTranslation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['postID', 'language', 'title', 'body'], 'required'],
            [['postID'], 'integer'],
            [['body', 'preview'], 'string'],
            [['language'], 'string', 'max' => 5],
            [['title', 'slug'], 'string', 'max' => 255],
            [['postID', 'language'], 'unique', 'targetAttribute' => ['postID', 'language'], 'message' => 'The combination of Post ID and Language has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postID' => 'Post ID',
            'language' => 'Language',
            'title' => 'Title',
            'body' => 'Body',
            'preview' => 'Preview',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'postID']);
    }
}
