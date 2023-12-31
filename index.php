<?php
require_once 'src/core/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    // Validating user role
    $validate = new Validate();
    if (Session::exists(Config::get('sessions/username')) && $validate->hasPermission('user')) {
        include(SRC_PATH . "/shared/userheader.php");
    } else if (Session::exists(Config::get('sessions/username')) && $validate->hasPermission('admin')) {
        include(SRC_PATH . "/shared/adminheader.php");
    }
    ?>
    <?php

    if (!Session::exists(Config::get('sessions/username'))) {
        ?>
        <section class="index-login">
            <div class="wrapper">
                <div class="index-login-signup">
                    <h4>SIGN UP</h4>
                    <form action="/securityphp/signup" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="pwdRepeat" placeholder="Repeat Password">
                        <input type="text" name="email" placeholder="Email">
                        <br><br>
                        <input type="hidden" name="signuptoken" value=<?php echo Token::generate("signup_token"); ?>
                            id="signuptoken">
                        <button type="submit" name="submit">SIGN UP</button>
                    </form>
                </div>
                <br>
                <div class="index-login-login">
                    <h4>LOGIN</h4>
                    <?php
                    if (isset($_SESSION['errormessage'])) {
                        echo ('<div class="alert alert-danger">' . $_SESSION['errormessage'] . '</div>');
                        unset($_SESSION['errormessage']);
                    }
                    ?>
                    <form action="/securityphp/login" method="post">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="pwd" placeholder="Password">
                        <br><br>
                        <input type="hidden" name="logintoken" value=<?php echo Token::generate("login_token"); ?>
                            id="logintoken">
                        <div class="g-recaptcha" data-sitekey=<?php echo Config::get("api/datasite_key"); ?>></div>
                        <button type="submit" name="submit">LOGIN</button>
                    </form>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>