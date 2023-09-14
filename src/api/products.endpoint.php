<?php
require_once('src/core/init.php');

if (Session::exists(Config::get("sessions/username"))) {

    $productController = new ProductController();
    $products = $productController->getProducts();

    // Show all products with user or admin functions
    $productView = new ProductView();
    $productView->showAllProducts($products);
}


// TODO: MOVE STYLING INTO CORRECT FOLDER & FILE
?>
<style>
    .product-card {
        border: 1px solid #ccc;
        padding: 10px;
        margin: 10px;
        display: inline-block;
        text-align: center;
    }

    .product-image {
        max-width: 100px;
        max-height: 100px;
    }

    .buy-button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-top: 10px;
        cursor: pointer;
    }
</style>