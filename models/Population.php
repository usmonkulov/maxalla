<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "population".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $middle_name
 * @property int $birthday
 * @property int $gender
 * @property string $passport
 * @property string $nation
 * @property int $region_id
 * @property int $city_id
 * @property int|null $town_block_id
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property PersonWhere[] $personWheres
 * @property Region $region
 * @property City $city
 * @property TownBlock $townBlock
 */
class Population extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'population';
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    // gender
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 10;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        if(User::isTheCreator() || User::isAdmin() || User::isRespublikaRaisi() || User::isRespublikaHodimi()):
            return [
                [['first_name', 'second_name', 'middle_name','birthday', 'gender', 'passport', 'nation', 'region_id', 'city_id', 'town_block_id','address'], 'required'],
                [['gender'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['first_name', 'birthday', 'second_name', 'middle_name', 'passport', 'nation', 'address', 'phone', 'email'], 'string', 'max' => 255],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['town_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => TownBlock::className(), 'targetAttribute' => ['town_block_id' => 'id']],
                [['user_id'], 'default','value'=> Yii::$app->user->id], 
                [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];  
        endif;

        if(User::isViloyatRaisi() || User::isViloyatHodimi()):
            return [
                [['first_name', 'second_name', 'middle_name','birthday', 'gender', 'passport', 'nation', 'address'], 'required'],
                [['gender'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['first_name', 'birthday', 'second_name', 'middle_name', 'passport', 'nation', 'address', 'phone', 'email'], 'string', 'max' => 255],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['town_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => TownBlock::className(), 'targetAttribute' => ['town_block_id' => 'id']],
                [['user_id'], 'default','value'=> Yii::$app->user->id], 
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']],  
                [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];  
        endif;

        if(User::isTumanRaisi() || User::isTumanHodimi()):
            return [
                [['first_name', 'second_name', 'middle_name','birthday', 'gender', 'passport', 'nation', 'address'], 'required'],
                [['gender'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['first_name', 'birthday', 'second_name', 'middle_name', 'passport', 'nation', 'address', 'phone', 'email'], 'string', 'max' => 255],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['town_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => TownBlock::className(), 'targetAttribute' => ['town_block_id' => 'id']],
                [['user_id'], 'default','value'=> Yii::$app->user->id], 
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];  
        endif;

        if(User::isMahhallaRaisi() || User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):
            return [
                [['first_name', 'second_name', 'middle_name','birthday', 'gender', 'passport', 'nation', 'address'], 'required'],
                [['gender'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['first_name', 'birthday', 'second_name', 'middle_name', 'passport', 'nation', 'address', 'phone', 'email'], 'string', 'max' => 255],
                [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
                [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
                [['town_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => TownBlock::className(), 'targetAttribute' => ['town_block_id' => 'id']],
                [['user_id'], 'default','value'=> Yii::$app->user->id], 
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['town_block_id'], 'default','value'=> Yii::$app->user->identity['town_block_id']], 
                [['image'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
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
            'user_id' => Yii::t('yii', 'Фойдаланувчи'),
            'first_name' => Yii::t('yii', 'Фамилия'),
            'second_name' => Yii::t('yii', 'Исм'),
            'middle_name' => Yii::t('yii', 'Отаси'),
            'birthday' => Yii::t('yii', 'Туғилган санаси'),
            'gender' => Yii::t('yii', 'Жинси'),
            'passport' => Yii::t('yii', 'Пасспорт'),
            'nation' => Yii::t('yii', 'Миллати'),
            'region_id' => Yii::t('yii', 'Вилоят'),
            'city_id' => Yii::t('yii', 'Туман'),
            'town_block_id' => Yii::t('yii', 'Маҳалла'),
            'address' => Yii::t('yii', 'Манзил'),
            'phone' => Yii::t('yii', 'Телефон'),
            'email' => Yii::t('yii', 'Электрон почта'),
            'image' => Yii::t('yii', 'Расм'),
            'created_at' => Yii::t('yii', 'Яратилган сана'),
            'updated_at' => Yii::t('yii', 'Ўзгартирилган сана'),
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
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
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

    public static function genderList(): array
    {
        return [
            self::GENDER_MALE   => Yii::t('yii', 'Эркак'),
            self::GENDER_FEMALE => Yii::t('yii', 'Аёл'),
        ];
    }

    public function getGender($gender)
    {
        return ArrayHelper::getValue(self::genderList(), $gender);
    }

    public function gender()
    {
        return [
            self::GENDER_MALE   => Yii::t('yii', 'Эркак'),
            self::GENDER_FEMALE => Yii::t('yii', 'Аёл'),
        ];
    }

    public function upload($folder,$imageFile)
    {
        $session = explode('/', $imageFile->type);
        $session = $session[0];
        $directory = 'uploads' . DIRECTORY_SEPARATOR . 'upload' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $session . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            \yii\helpers\FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = 'uploads/upload/'.$folder.'/'.$session.'/'.$fileName;
                return $path;
            }
        }

        return false;
    }
}
