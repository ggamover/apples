<?php
namespace console\controllers;

use common\models\User;
use yii\helpers\Console;

/**
 * Access control utility
 *
 * Class AuthController
 * @package console\controllers
 */
class AuthController extends \yii\console\Controller
{
    /**
     * set login password
     *
     * @param $password
     * @return int
     */
    public function actionSetPwd($password)
    {
        $user = User::findOne(['username' => 'user']);
        if(!$user){
            $user = new User();
            $user->username = 'user';
            $user->email = 'no.mail@email.net';
            $user->status = User::STATUS_ACTIVE;
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
        }
        $user->setPassword($password);
        if($user->save()){
            $this->stdout('new password set', Console::FG_GREEN);
        }else{
            $this->stdout('could not change password', Console::FG_RED);
        }
        $this->stdout(PHP_EOL);
        return 1;
    }
}