<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "admin_nav".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $sort
 * @property integer $parent
 * @property integer $menuType
 * @property string $icon
 */
class AdminNavigation extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AdminNavigation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'required'],
            [['sort', 'parent', 'menuType'], 'integer'],
            [['title', 'url', 'icon'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'url' => Yii::t('app', 'Url'),
            'sort' => Yii::t('app', 'Sort'),
            'parent' => Yii::t('app', 'Parent'),
            'menuType' => Yii::t('app', '1 - top 
2 - bottom
 
3 - left'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }
}
