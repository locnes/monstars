<?php
/**
 * Created by PhpStorm.
 * User: nlangloi10
 * Date: 4/18/16
 * Time: 5:18 PM
 */

namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;


class Step2 extends Model
{
    public $design_id;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['design_id'], 'required', 'message' => 'You\'ve got to pick a T-shirt design!'],
            //[['design_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'design_id' => 'T-shirt design',
        ];
    }


    /**
     * Returns an array of all of the "live" T-shirt designs
     * @return array
     */
    public static function getDesignList()
    {
        $options = Tdesign::find()->asArray()->where(['status' => 'Y'])->all();
        return ArrayHelper::map($options, 'id', 'title');
    }


    /**
     * Returns an array of all of the "live" T-shirt designs grouped by their parent category for use in an HTML select optgroup, and only shows those categories that contain "live" T-shirt designs
     * @return array
     */
    public static function getDesignsHierarchy()
    {
        $options = [];

        //SELECT categoryId FROM Tdesign WHERE status = 'Y'
        $subQuery = Tdesign::find()
            ->select(['categoryId'])
            ->where(['status' => 'Y'])//->all()
        ;

        //SELECT Tcategories.* FROM Tcategories WHERE Tcategories.id IN (SELECT categoryId FROM Tdesign);
        $parents = Tcategories::find()
            ->select(['id', 'cat_name'])
            ->where(['IN', 'id', $subQuery])
            ->all();

        foreach ($parents as $id => $p) {
            $children = Tdesign::find()
                ->where("categoryId=:categoryId AND status=:status", [":categoryId" => $p->id, ":status" => "Y"])
                ->orderBy(['title' => SORT_ASC])
                ->all();
            $child_options = [];
            foreach ($children as $child) {
                $child_options[$child->id] = $child->title;
            }
            $options[$p->cat_name] = $child_options;
        }
        return $options;
    }


}