<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name
 * @property int|null $region_id
 *
 * @property Region $region
 * @property Population[] $populations
 * @property TownBlock[] $townBlocks
 * @property User[] $users
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ИД рақами'),
            'name' => Yii::t('yii', 'Туман'),
            'register_id' => Yii::t('yii', 'Вилоят'),
        ];
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
     * Gets query for [[Populations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPopulations()
    {
        return $this->hasMany(Population::className(), ['city_id' => 'id']);
    }

    /**
     * Gets query for [[TownBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTownBlocks()
    {
        return $this->hasMany(TownBlock::className(), ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['city_id' => 'id']);
    }
}

