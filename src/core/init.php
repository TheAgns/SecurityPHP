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
        'db' => 'phpProject',
        'charset' => 'utf8mb4'
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function ($class) {
    require_once 'src/classes/' . $class . '.php';
});

require_once 'src/utils/sanitize.php';

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