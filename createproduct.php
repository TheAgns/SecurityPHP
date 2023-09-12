<?php
require_once('src/core/init.php');

$validate = new Validate();
if (Session::exists(Config::get('sessions/username')) && $validate->hasPermission('admin')) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <form method="post" action="/securityphp/create">
            <div class="field">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" step="0.01" required>
            </div>
            <div class="field">
                <label for="img_url">Image URL</label>
                <input type="text" name="img_url" id="img_url" required>
            </div>
            <button type="submit">Create Product</button>
        </form>
    </body>

    </html>

<?php } else {
    Redirect::to("/securityphp");
} ?>