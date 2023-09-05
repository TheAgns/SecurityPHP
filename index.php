<?php
ini_set('display_errors', 1);
require_once 'src/core/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Index Site</title>
</head>
<body>
    <header>
        <h1>Welcome to My Simple Index Site</h1>
    </header>

    <main>
        <p>Hello, world!</p>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> YourWebsite.com</p>
    </footer>
</body>
</html>
