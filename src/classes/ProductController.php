<?php

class ProductController extends Product
{

    public function __construct()
    {

    }

    public function createProduct($productName, $price, $img_url)
    {
        $this->insertProduct($productName, $price, $img_url);
    }

    public function getProducts()
    {
        return $this->getAllProducts();
    }

    public function addProductToCart($productId)
    {

    }
}