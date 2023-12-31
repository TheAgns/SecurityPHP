<?php
session_start();

define("CORE_PATH", dirname(__FILE__));
define("SRC_PATH", dirname(CORE_PATH));
define("PROJECT_PATH", dirname(SRC_PATH));


$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'securityphp',
        'charset' => 'utf8mb4'
    ),
    'sessions' => array(
        'userid' => 'user',
        'username' => 'username',
        'role' => 'role',
        'signup_token' => 'signup',
        'login_token' => 'login',
        'token' => 'token'
    ),
    'api' => array(
        'datasite_key' => '6LfAKfgnAAAAAMJ1aHAy-_iepR4oxuVsss0gUQBc',
        'api_key' => '6LfAKfgnAAAAAFPIbzYDV36oTSofW7ql9XzYblyA'
    )
);

spl_autoload_register(function ($class) {
    require_once 'src/classes/' . $class . '.php';
});

require_once 'src/utils/sanitize.php';
require_once 'src/utils/recaptcha.php';
require_once 'src/utils/logger.php';

/*
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}
*/