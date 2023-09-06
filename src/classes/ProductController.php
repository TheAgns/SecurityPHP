<?php

class ProductController {
    public function listProducts() {
        include_once('ProductModel.php');
        $productModel = new ProductModel();

        $products = $productModel->getAllProducts();

        include('product-list.php');
    }
}
