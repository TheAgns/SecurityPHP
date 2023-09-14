<?php
require_once("src/core/init.php");

$validate = new Validate();

if (Session::exists(Config::get("sessions/username")) && $validate->hasPermission("admin")) {
    var_dump(Input::get("token"), "token");
    var_dump(Session::get(Config::get("sessions/token")));

    if (Token::check(Input::get("token"), "token")) {
        $productController = new ProductController();

        if (!empty(Input::get("product_id"))) {
            var_dump($productId);
            $productId = Input::get("product_id");
            $productController->deleteProduct($productId);
        } else {
            $productId = escape($id);
            $productId = $productController->getProduct($id)["id"];
            $productController->deleteProduct($productId);
        }
        Redirect::to("/securityphp/products");
    }
} else {
    Redirect::to("/securityphp/404");
    exit();
}