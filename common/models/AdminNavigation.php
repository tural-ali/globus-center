<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "AdminNavigation".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $sort
 * @property integer $parent
 * @property integer $menuType
 * @property string $icon
 */
class AdminNavigation extends \yii\db\ActiveRecord
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
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'sort' => 'Sort',
            'parent' => 'Parent',
            'menuType' => 'Menu Type',
            'icon' => 'Icon',
        ];
    }
}
