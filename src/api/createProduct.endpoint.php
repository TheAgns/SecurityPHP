<?php

require_once("src/core/init.php");

$productName = escape(Input::get("name"));
$price = escape(Input::get("price"));
$img_url = escape(Input::get("img_url"));

$productController = new ProductController();
$productController->createProduct($productName, $price, $img_url);

Redirect::to("/securityphp/products");

?>