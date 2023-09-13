<?php
require_once 'src/core/init.php';

session_start();
session_unset();
session_destroy();

Redirect::to("/securityphp");