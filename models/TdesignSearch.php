<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TdesignSearch represents the model behind the search form about `app\models\Tdesign`.
 */
class TdesignSearch extends Tdesign
{

    public $category;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoryId'], 'integer'],
            [['title', 'description', 'fileName', 'status', 'category'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tdesign::find();
        $query->joinWith(['category']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Important: here is how we set up the sorting
        // The key is the attribute name on our "TdesignSearch" instance
        $dataProvider->sort->attributes['category'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['Tcategories.cat_name' => SORT_ASC],
            'desc' => ['Tcategories.cat_name' => SORT_DESC],
        ];


        //$this->load($params);
        // No search? Then return data Provider
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        /*
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        */


        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'categoryId' => $this->categoryId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'fileName', $this->fileName])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'Tcategories.id', $this->category]);

        return $dataProvider;
    }
}
