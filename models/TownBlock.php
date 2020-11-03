<?php

namespace app\models;
use app\models\User;
use Yii;

/**
 * This is the model class for table "town_block".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property int $region_id
 *
 * @property Population[] $populations
 * @property City $city
 * @property Region $region
 * @property User[] $users
 */
class TownBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'town_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):
            return [
                [['name','city_id','region_id'], 'required'],
                [['name'], 'string', 'max' => 255],
                ['city_id', 'integer',
                        'message' => Yii::t('yii', '«Туман» тўлдириш шарт.')],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            ];
        endif;

        if(User::isViloyatRaisi() || User::isViloyatHodimi()):
            return [
                [['name','city_id'], 'required'],
                [['name'], 'string', 'max' => 255],
                // [['city_id'], 'integer'],

                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                ['city_id', 'integer',
                        'message' => Yii::t('yii', '«Туман» тўлдириш шарт.')],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            ];
        endif;

         if(User::isTumanRaisi() || User::isTumanHodimi()):
            return [
                [['name'], 'required'],
                [['name'], 'string', 'max' => 255],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            ];
        endif;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ИД рақами'),
            'name' => Yii::t('yii', 'Маҳалла'),
            'city_id' => Yii::t('yii', 'Туман'),
            'region_id' => Yii::t('yii', 'Вилоят'),
        ];
    }

     /**
     * Gets query for [[Populations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPopulations()
    {
        return $this->hasMany(Population::className(), ['town_block_id' => 'id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['town_block_id' => 'id']);
    }
}
