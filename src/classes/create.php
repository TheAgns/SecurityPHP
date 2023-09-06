<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('src/core/init.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="/auth/create">
    <div class="field">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="field">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" step="0.01" required>
    </div>
    <div class="field">
        <label for="url_image">Image URL</label>
        <input type="text" name="url_image" id="url_image" required>
    </div>
    <button type="submit">Create Product</button>
</form>
</body>
</html>
