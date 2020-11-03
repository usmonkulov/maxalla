<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $avatar
 * @property string $first_name
 * @property string $second_name
 * @property string $middle_name
 * @property string $birthday
 * @property int $gender
 * @property string $passport
 * @property string $nation
 * @property int $region_id
 * @property int $city_id
 * @property int $town_block_id
 * @property string $address
 * @property string $phone
 * @property string $specialist
 * @property string $be_elected_den
 *
 * @property City $city
 * @property Region $region
 * @property TownBlock $townBlock
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'avatar', 'first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'region_id', 'city_id', 'town_block_id', 'address', 'phone', 'specialist', 'be_elected_den'], 'required'],
            [['user_id', 'gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
            [['avatar', 'first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'address', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['town_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => TownBlock::className(), 'targetAttribute' => ['town_block_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'avatar' => 'Avatar',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'middle_name' => 'Middle Name',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'passport' => 'Passport',
            'nation' => 'Nation',
            'region_id' => 'Region ID',
            'city_id' => 'City ID',
            'town_block_id' => 'Town Block ID',
            'address' => 'Address',
            'phone' => 'Phone',
            'specialist' => 'Specialist',
            'be_elected_den' => 'Be Elected Den',
        ];
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
     * Gets query for [[TownBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTownBlock()
    {
        return $this->hasOne(TownBlock::className(), ['id' => 'town_block_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
