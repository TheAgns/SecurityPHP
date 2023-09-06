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
                    <li><a href="index.php">HOME</a></li>
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
</body>

</html>

<?php
/*
if ($user->isLoggedIn()) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <p>Hello, <a href="profile.php?user=<?php echo escape($user->data()->username); ?>" class="text-primary"><?php echo escape($user->data()->username); ?></a></p>

            <ul class="list-group">
                <li class="list-group-item"><a href="update.php" class="text-dark">Update Profile</a></li>
                <li class="list-group-item"><a href="changepassword.php" class="text-dark">Change Password</a></li>
                <li class="list-group-item"><a href="logout.php" class="text-dark">Log out</a></li>
                <li class="list-group-item"><a href="products.php" class="text-dark">Products</a></li>
                <li class="list-group-item"><a href="delete.php" class="text-danger">Delete</a></li>
            </ul>
        </div>

        <?php

        if ($user->hasPermission('admin')) {
            echo '<p class="mt-3 alert alert-success">You are an Administrator!</p>';
        }

        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
} else {

    echo '<p class="mt-5">You need to <a href="login.php" class="text-primary">login</a> or <a href="register.php" class="text-primary">register.</a></p>';
}
*/
?>