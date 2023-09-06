<?php
include_once('ProductModel.php');

class GetAllProducts {
    public function listProducts() {
        try {
            $productModel = new ProductModel();
            $products = $productModel->getAllProducts();
            return $products;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        // include('product-list.php');
    }
}
