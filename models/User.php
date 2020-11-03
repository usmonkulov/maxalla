<?php
namespace app\models;

use app\rbac\models\Role;
use kartik\password\StrengthValidator;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the user model class extending UserIdentity.
 * Here you can implement your custom user solutions.
 * 
 * @property Role[] $role
 * @property Article[] $articles
 */
class User extends UserIdentity
{
    // the list of status values that can be stored in user table
    const STATUS_ACTIVE   = 10;
    const STATUS_INACTIVE = 1;
    const STATUS_DELETED  = 0;   

    // gender
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 10;

    /**
     * List of names for each status.
     * @var array
     */
    public $statusList = [
        self::STATUS_ACTIVE   => 'Фаол',
        self::STATUS_INACTIVE => 'Фаол эмас',
        // self::STATUS_DELETED  => 'Deleted'
    ];

    /**
     * We made this property so we do not pull hashed password from db when updating
     * @var string
     */
    public $password;

    /**
     * @var \app\rbac\models\Role
     */
    public $item_name;

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        if(User::isTheCreator()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
                // [['image'], 'image', 'minWidth' => '114', 'minHeight' => '18', 'maxWidth' => '114', 'maxHeight' => '18'],
                [['first_name', 'second_name', 'middle_name', 'phone'], 'required'],
                [['first_name', 'second_name', 'middle_name', 'phone'], 'string', 'max' => 255],
            ];
        endif;

         if(User::isAdmin()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone'], 'required'],
                [['gender'], 'integer'],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'address', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

        if(User::isRespublikaRaisi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['region_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу вилоят олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'region_id', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id'], 'integer'],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

         if(User::isRespublikaHodimi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['region_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу вилоят олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id'], 'integer'],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

          if(User::isViloyatRaisi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['city_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу туман олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', /*'city_id',*/ 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'city_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['avatar', 'first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

         if(User::isViloyatHodimi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['city_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу туман олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation',/* 'city_id',*/ 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'city_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

        if(User::isTumanRaisi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['town_block_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу маҳалла олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

        if(User::isTumanHodimi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                // ['town_block_id', 'unique', 
                //     'message' => Yii::t('yii', 'Бу маҳалла олдин рўйхатдан ўтган.')],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

        if(User::isMahhallaRaisi()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['town_block_id'], 'default','value'=> Yii::$app->user->identity['town_block_id']], 
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;

        if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):
            return [
                ['username', 'filter', 'filter' => 'trim'],
                ['username', 'required'],
                ['username', 'string', 'min' => 2, 'max' => 255],
                ['username', 'match',  'not' => true,
                    // we do not want to allow users to pick one of spam/bad usernames 
                    'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                    'message' => Yii::t('app', 'It\'s impossible to have that username.')],          
                ['username', 'unique', 
                    'message' => Yii::t('app', 'This username has already been taken.')],

                ['email', 'filter', 'filter' => 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 
                    'message' => Yii::t('app', 'This email address has already been taken.')],

                // password field is required on 'create' scenario
                ['password', 'required', 'on' => 'create'],
                // use passwordStrengthRule() method to determine password strength
                $this->passwordStrengthRule(),

                ['status', 'required'],
                ['item_name', 'string', 'min' => 3, 'max' => 64],
                [['first_name', 'second_name', 'middle_name', 'birthday', 'gender', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'required'],
                [['gender', 'region_id', 'city_id', 'town_block_id'], 'integer'],
                [['region_id'], 'default','value'=> Yii::$app->user->identity['region_id']], 
                [['city_id'], 'default','value'=> Yii::$app->user->identity['city_id']], 
                [['town_block_id'], 'default','value'=> Yii::$app->user->identity['town_block_id']], 
                [['first_name', 'second_name', 'middle_name', 'birthday', 'passport', 'nation', 'phone', 'specialist', 'be_elected_den'], 'string', 'max' => 255],
                [['avatar'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
            ];
        endif;
    }

    /**
     * Set password rule based on our setting value (Force Strong Password).
     *
     * @return array Password strength rule.
     */
    private function passwordStrengthRule()
    {
        // get setting value for 'Force Strong Password'
        $fsp = Yii::$app->params['fsp'];

        // password strength rule is determined by StrengthValidator 
        // presets are located in: vendor/kartik-v/yii2-password/presets.php
        $strong = [['password'], StrengthValidator::className(), 'preset'=>'normal'];

        // normal yii rule
        $normal = ['password', 'string', 'min' => 6];

        // if 'Force Strong Password' is set to 'true' use $strong rule, else use $normal rule
        return ($fsp) ? $strong : $normal;
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'Ид рақами'),
            'avatar' => Yii::t('yii', 'Аватар'),
            'first_name' => Yii::t('yii', 'Фамилия'),
            'second_name' => Yii::t('yii', 'Исм'),
            'middle_name' =>  Yii::t('yii', 'Отаси'),
            'birthday' => Yii::t('yii', 'Туғилган санаси'),
            'gender' => Yii::t('yii', 'Жинси'),
            'passport' => Yii::t('yii', 'Пасспорт'),
            'nation' => Yii::t('yii', 'Миллати'),
            'region_id' => Yii::t('yii', 'Вилоят'),
            'city_id' => Yii::t('yii', 'Туман'),
            'town_block_id' => Yii::t('yii', 'Маҳалла'),
            'address' => Yii::t('yii', 'Манзил'),
            'phone' => Yii::t('yii', 'Телефон'),
            'specialist' => Yii::t('yii', 'Мутахасислиги'),
            'be_elected_den' => Yii::t('yii', 'Ишга кирган санаси'),
            'username' => Yii::t('yii', 'Фойдаланувчи логини'),
            'password' => Yii::t('yii', 'Парол'),
            'email' => Yii::t('yii', 'Электрон почта'),
            'status' => Yii::t('yii', 'Ҳолати'),
            'created_at' => Yii::t('yii', 'Яратилган сана'),
            'updated_at' => Yii::t('yii', 'Ўзгартирилган сана'),
            'item_name' => Yii::t('yii', 'Ҳуқуқи'),
        ];
    }

    /**
     * Relation with Role model.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        // User has_one Role via Role.user_id -> id
        return $this->hasOne(Role::className(), ['user_id' => 'id']);
    }

//------------------------------------------------------------------------------------------------//
// USER FINDERS
//------------------------------------------------------------------------------------------------//

    /**
     * Finds user by username.
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }  
    
    /**
     * Finds user by email.
     *
     * @param  string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    } 

    /**
     * Finds user by password reset token.
     *
     * @param  string $token Password reset token.
     * @return null|static
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => User::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by account activation token.
     *
     * @param  string $token Account activation token.
     * @return static|null
     */
    public static function findByAccountActivationToken($token)
    {
        return static::findOne([
            'account_activation_token' => $token,
            'status' => User::STATUS_INACTIVE,
        ]);
    }
  
//------------------------------------------------------------------------------------------------//
// HELPERS
//------------------------------------------------------------------------------------------------//

    /**
     * Returns the user status in nice format.
     *
     * @param  integer $status Status integer value.
     * @return string          Nicely formatted status.
     */
    public function getStatusName($status)
    {
        return $this->statusList[$status];
    }

    /**
     * Returns the role name.
     * If user has any custom role associated with him we will return it's name, 
     * else we return 'member' to indicate that user is just a member of the site with no special roles.
     *
     * @return string
     */
    public function getRoleName()
    {
        // if user has some role assigned, return it's name
        if ($this->role) {
            return $this->role->item_name;
        }
        
        // user does not have role assigned, but if he is authenticated '@'
        return '@uthenticated';
    }

    /**
     * Generates new password reset token.
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token.
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Finds out if password reset token is valid.
     * 
     * @param  string $token Password reset token.
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Generates new account activation token.
     */
    public function generateAccountActivationToken()
    {
        $this->account_activation_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes account activation token.
     */
    public function removeAccountActivationToken()
    {
        $this->account_activation_token = null;
    }
    public static function isTheCreator() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == theCreator;
    }

    public static function isAdmin() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == admin;
    }

    public static function isRespublikaRaisi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == respublikaRaisi;
    }

    public static function isRespublikaHodimi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == respublikaHodimi;
    }

    public static function isViloyatRaisi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == viloyatRaisi;
    }

    public static function isViloyatHodimi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == viloyatHodimi;
    }

    public static function isTumanRaisi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == tumanRaisi;
    }

    public static function isTumanHodimi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == tumanHodimi;
    }

    public static function isMahhallaRaisi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == mahhallaRaisi;
    }
     public static function isKotib() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == kotib;
    }
     public static function isMaslahatchi() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == maslahatchi;
    }
     public static function isPospon() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == pospon;
    }
     public static function isInspektor() {
        $user = self::findOne(Yii::$app->user->id);
        return $user->role->item_name == inspektor;
    }

    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
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
