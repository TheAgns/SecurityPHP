<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $url_image = $_POST['url_image'];

    require_once('ProductModel.php');
    $productModel = new ProductModel();

    $productData = [
        'name' => $name,
        'price' => $price,
        'url_image' => $url_image,
    ];

    if ($productModel->insertProduct($productData)) {
        echo 'Product created successfully!';
    } else {
        echo 'Error creating the product.';
    }
}
?>
