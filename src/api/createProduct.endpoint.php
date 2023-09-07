<?php

require_once("src/core/init.php");

// Vi skal tjekke om brugeren er logget ind, og om brugeren har de nødvendige tilladelser til at kunne oprette et produkt 

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productName = $_POST['name'];
        $price = floatval($_POST['price']);
        $img_url = $_POST['img_url'];
        //Her skal vi tjekke igen om brugeren er logget ind, og om brugeren har de nødvendige tilladelser til at kunne oprette et produkt

        $productController = new ProductController();
        $productController->createProduct($productName, $price, $img_url);

        header("location: /securityphp/products");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
