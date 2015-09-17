<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "NavigationTranslation".
 *
 * @property integer $id
 * @property integer $navigationID
 * @property string $language
 * @property string $url
 * @property string $title
 *
 * @property Navigation $navigation
 */
class NavigationTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NavigationTranslation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['navigationID', 'language'], 'required'],
            [['navigationID'], 'integer'],
            [['language'], 'string', 'max' => 5],
            [['url', 'title'], 'string', 'max' => 255],
            [['navigationID', 'language'], 'unique', 'targetAttribute' => ['navigationID', 'language'], 'message' => 'The combination of Navigation ID and Language has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'navigationID' => 'Navigation ID',
            'language' => 'Language',
            'url' => 'Url',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNavigation()
    {
        return $this->hasOne(Navigation::className(), ['id' => 'navigationID']);
    }
}
