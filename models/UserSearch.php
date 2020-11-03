<?php
namespace app\models;

use app\rbac\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use Yii;
use app\models\User;

/**
 * UserSearch represents the model behind the search form for app\models\User.
 */
class UserSearch extends User
{
    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['second_name', 'passport','region_id','city_id','town_block_id','phone','username', 'email', 'status', 'item_name'], 'safe'],
        ];
    }

    /**
     * Returns a list of scenarios and the corresponding active attributes.
     *
     * @return array
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied.
     *
     * @param  array   $params
     * @param  integer $pageSize How many users to display per page.
     * @return ActiveDataProvider
     */
    public function search($params, $pageSize = 10)
    {
        $query = User::find()->joinWith('role');
        if(User::isAdmin()):
            // if user is not 'theCreator' ( You ), do not show him users with this role
            if (!Yii::$app->user->can('theCreator')) {
                $query->where(['!=', 'item_name', 'theCreator']);
            }
             if (Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }
        endif;

        if(User::isTheCreator()):
            // if user is not 'theCreator' ( You ), do not show him users with this role
            if (Yii::$app->user->can('theCreator')) {
                $query->where(['!=', 'item_name', 'theCreator']);
            }
        endif;

        if(User::isRespublikaRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }
            if (Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
             if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }
            if (Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
        endif;

        if(User::isRespublikaHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }
            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
            if (Yii::$app->user->can('respublikaHodimi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaHodimi']);
            }
            if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }
            if (Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
        endif;

        if(User::isViloyatRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
            if (!Yii::$app->user->can('respublikaHodimi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaHodimi']);
            }
            if (Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }

            if (!Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
            $region = Yii::$app->user->identity['region_id'];
            $query->andFilterWhere(['user.region_id' => $region]);
        endif;

         if(User::isViloyatHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
            if (!Yii::$app->user->can('respublikaHodimi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaHodimi']);
            }
            if (!Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }

            if (!Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
            $region = Yii::$app->user->identity['region_id'];
            $query->andFilterWhere(['user.region_id' => $region]);
        endif;

        if(User::isTumanRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
            if (!Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
            $city = Yii::$app->user->identity['city_id'];
            $query->andFilterWhere(['user.city_id' => $city]);
        endif;

         if(User::isTumanHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
            if (!Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (!Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }
            if (!Yii::$app->user->can('pospon')) {
                $query->andWhere(['!=', 'item_name', 'pospon']);
            }
            if (!Yii::$app->user->can('kotib')) {
                $query->andWhere(['!=', 'item_name', 'kotib']);
            }
            if (!Yii::$app->user->can('inspektor')) {
                $query->andWhere(['!=', 'item_name', 'inspektor']);
            }
            if (!Yii::$app->user->can('maslahatchi')) {
                $query->andWhere(['!=', 'item_name', 'maslahatchi']);
            }
            $city = Yii::$app->user->identity['city_id'];
            $query->andFilterWhere(['user.city_id' => $city]);
        endif;

        if(User::isMahhallaRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
             if (!Yii::$app->user->can('respublikaHodimi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaHodimi']);
            }
            if (!Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (!Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }
            if (Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            $city = Yii::$app->user->identity['city_id'];
            $query->andFilterWhere(['user.city_id' => $city]);

            $town_block = Yii::$app->user->identity['town_block_id'];
            $query->andFilterWhere(['user.town_block_id' => $town_block]);
        endif;

        if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):
            if (!Yii::$app->user->can('theCreator')) {
                $query->andWhere(['!=', 'item_name', 'theCreator']);
            }
            if (!Yii::$app->user->can('admin')) {
                $query->andWhere(['!=', 'item_name', 'admin']);
            }

            if (!Yii::$app->user->can('respublikaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaRaisi']);
            }
             if (!Yii::$app->user->can('respublikaHodimi')) {
                $query->andWhere(['!=', 'item_name', 'respublikaHodimi']);
            }
            if (!Yii::$app->user->can('viloyatRaisi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatRaisi']);
            }
            if (!Yii::$app->user->can('viloyatHodimi')) {
                $query->andWhere(['!=', 'item_name', 'viloyatHodimi']);
            }
            if (!Yii::$app->user->can('tumanRaisi')) {
                $query->andWhere(['!=', 'item_name', 'tumanRaisi']);
            }
            if (!Yii::$app->user->can('tumanHodimi')) {
                $query->andWhere(['!=', 'item_name', 'tumanHodimi']);
            }
            if (Yii::$app->user->can('mahhallaRaisi')) {
                $query->andWhere(['!=', 'item_name', 'mahhallaRaisi']);
            }
            // $city = Yii::$app->user->identity['city_id'];
            // $query->andFilterWhere(['user.city_id' => $city]);

            // $town_block = Yii::$app->user->identity['town_block_id'];
            // $query->andFilterWhere(['user.town_block_id' => $town_block]);
        endif;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_ASC]],
            'pagination' => ['pageSize' => 20],
            
        ]);
        
        $dataProvider->sort->defaultOrder = ['id'=>SORT_ASC];

        // make item_name (Role) sortable
        $dataProvider->sort->attributes['item_name'] = [
            'asc' => ['item_name' => SORT_ASC],
            'desc' => ['item_name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
              ->andFilterWhere(['like', 'second_name', $this->second_name])
              ->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'passport', $this->passport])
              ->andFilterWhere(['like', 'region_id', $this->region_id])
              ->andFilterWhere(['like', 'city_id', $this->city_id])
              ->andFilterWhere(['like', 'town_block_id', $this->town_block_id])
              ->andFilterWhere(['like', 'phone', $this->phone])
              ->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }

    /**
     * Returns the array of possible user roles.
     * NOTE: used in user/index view.
     *
     * @return mixed
     */
    public static function getRolesList()
    {
        $roles = [];

        foreach (AuthItem::getRoles() as $item_name) {
            $roles[$item_name->name] = $item_name->name;
        }

        return $roles;
    }
}
