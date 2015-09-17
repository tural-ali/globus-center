<?
namespace common\models;

use yii\db\ActiveQuery;

class NavigationQuery extends ActiveQuery
{
    public function root()
    {
        $this->andWhere(['parentID' => null]);
        return $this;
    }
}