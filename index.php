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
    <header>
        <nav>
            <div>
                <h3>SECURITY PHP</h3>
                <ul class="menu-main">
                    <li><a href="/securityphp">HOME</a></li>
                    <li><a href="a">PRODUCTS</a></li>
                    <li><a href="a">CART</a></li>
                    <li><a href="a">PROFILE</a></li>
                </ul>
            </div>
            <ul class="menu-member">
                <li><a href="a">SIGN UP</a></li>
                <li><a href="a">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <section class="index-login">
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>SIGN UP</h4>
                <p>Sign up here!</p>
                <form action="/securityphp/signup" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwdRepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="Email">
                    <br><br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
            </div>
            <br>
            <div class="index-login-login">
                <h4>LOGIN</h4>
                <p>Login here!</p>
                <form action="login" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <br><br>
                    <button type="submit" name="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>