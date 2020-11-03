<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_where".
 *
 * @property int $id
 * @property string $republic
 * @property string $region
 * @property string $city
 * @property string $address
 * @property string $working_place
 * @property string $education
 * @property string $export
 * @property string $import
 * @property int $population_id
 *
 * @property Population $population
 */
class PersonWhere extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_where';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['republic', 'region', 'city', 'address', 'working_place', 'education', 'export', 'import', 'population_id'], 'required'],
            [['address'], 'string'],
            [['population_id'], 'integer'],
            [['republic', 'region', 'city', 'working_place', 'education', 'export', 'import'], 'string', 'max' => 255],
            [['population_id'], 'exist', 'skipOnError' => true, 'targetClass' => Population::className(), 'targetAttribute' => ['population_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ИД рақами'),
            'republic' => Yii::t('yii', 'Қайси Республикада'),
            'region' => Yii::t('yii', 'Қайси Регионда'),
            'city' => Yii::t('yii', 'Қайси Шаҳарда'),
            'address' => Yii::t('yii', 'Ҳозирда турган манзили'),
            'working_place' => Yii::t('yii', 'Нима иш қилади'),
            'education' => Yii::t('yii', 'Қайси таълимни тугатган'),
            'export' => Yii::t('yii', 'Кетган санаси'),
            'import' => Yii::t('yii', 'Келган санаси'),
            'population_id' => Yii::t('yii', 'Аҳоли'),
        ];
    }

    /**
     * Gets query for [[Population]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPopulation()
    {
        return $this->hasOne(Population::className(), ['id' => 'population_id']);
    }
}
