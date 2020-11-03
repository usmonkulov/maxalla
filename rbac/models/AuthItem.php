<?php
namespace app\rbac\models;

use yii\db\ActiveRecord;
use Yii;
use app\models\User;

/**
 * This is the model class for table "auth_item".
 *
 * @property string  $name
 * @property integer $type
 * @property string  $description
 * @property string  $rule_name
 * @property string  $data
 * @property integer $created_at
 * @property integer $updated_at
 */
class AuthItem extends ActiveRecord
{
    /**
     * Declares the name of the database table associated with this AR class.
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    /**
     * Returns roles.
     * NOTE: used in user/index and user/update.
     *
     * @return array|\yii\db\ActiveRecord[]
     */
   
    public static function getRoles()
    {
        if(User::isTheCreator()):
            // if user is not 'theCreator' ( You ), we do not want to show him users with that role
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')->where(['type' => 1])->andWhere(['!=', 'name', 'theCreator'])->all();
            }

            // this is You or some other super admin, so show everything 
            return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

        if(User::isAdmin()):
             if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                // ->andWhere(['!=', 'name', 'admin'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

        if(User::isRespublikaRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')->orderBy(['name' => SORT_DESC])
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                // ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'tumanRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

         if(User::isRespublikaHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')->orderBy(['name' => SORT_DESC])
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'tumanRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

        if(User::isViloyatRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                // ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;


        if(User::isViloyatHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                // ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

        if(User::isTumanRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                // ->andWhere(['!=', 'name', 'tumanRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

         if(User::isTumanHodimi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'tumanRaisi'])
                // ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'mahhallaHodimi'])
                ->andWhere(['!=', 'name', 'inspektor'])
                ->andWhere(['!=', 'name', 'kotib'])
                ->andWhere(['!=', 'name', 'maslahatchi'])
                ->andWhere(['!=', 'name', 'pospon'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

        if(User::isMahhallaRaisi()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'tumanRaisi'])
                // ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'tumHodim'])
                ->andWhere(['!=', 'name', 'vilHodim'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

          if(User::isKotib() || User::isMaslahatchi() || User::isPospon() || User::isInspektor()):
            if (!Yii::$app->user->can('theCreator')) {
                return static::find()->select('name')
                ->where(['type' => 1])
                ->andWhere(['!=', 'name', 'theCreator'])
                ->andWhere(['!=', 'name', 'admin'])
                ->andWhere(['!=', 'name', 'respublikaHodimi'])
                ->andWhere(['!=', 'name', 'respublikaRaisi'])
                ->andWhere(['!=', 'name', 'viloyatHodimi'])
                ->andWhere(['!=', 'name', 'viloyatRaisi'])
                ->andWhere(['!=', 'name', 'tumanHodimi'])
                ->andWhere(['!=', 'name', 'tumanRaisi'])
                ->andWhere(['!=', 'name', 'mahhallaRaisi'])
                ->andWhere(['!=', 'name', 'tumHodim'])
                ->andWhere(['!=', 'name', 'vilHodim'])
                ->andWhere(['!=', 'name', 'resHodim'])
                ->all();
            }

        // this is You or some other super admin, so show everything 
        return static::find()->select('name')->where(['type' => 1])->all(); 
        endif;

    }

}
