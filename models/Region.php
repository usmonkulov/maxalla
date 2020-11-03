<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name
 *
 * @property City[] $cities
 * @property Population[] $populations
 * @property TownBlock[] $townBlocks
 * @property User[] $users
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ИД рақами'),
            'name' => Yii::t('yii', 'Вилоят'),
        ];
    }
     /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[Populations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPopulations()
    {
        return $this->hasMany(Population::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[TownBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTownBlocks()
    {
        return $this->hasMany(TownBlock::className(), ['register_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['region_id' => 'id']);
    }
}
