<?php

require_once("src/core/init.php");

$validate = new Validate();
if (Session::exists(Config::get("sessions/username")) && $validate->hasPermission("admin")) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = escape(Input::get("name"));
        $price = escape(Input::get("price"));
        $img_url = escape(Input::get("img_url"));

        $productController = new ProductController();
        $productController->createProduct($productName, $price, $img_url);
        Redirect::to("/securityphp/products");
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $productView = new ProductView();
        $productView->showCreateProductForm();
    }
}
?>