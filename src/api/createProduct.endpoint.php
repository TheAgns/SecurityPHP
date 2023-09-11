<?php

require_once("src/core/init.php");

$productName = Input::get("name");
$price = Input::get("price");
$img_url = Input::get("img_url");

$productController = new ProductController();
$productController->createProduct($productName, $price, $img_url);

Redirect::to("/securityphp/products");

?>