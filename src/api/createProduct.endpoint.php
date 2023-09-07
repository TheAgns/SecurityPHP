<?php

require_once("src/core/init.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $price = $_POST['price'];
    $img_url = $_POST['img_url'];

    $productController = new ProductController();
    $productController->createProduct($productName, $price, $img_url);

    header("location: /securityphp/products");
}
?>