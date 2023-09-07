<?php
require_once("src/core/init.php");
class Product
{

    protected $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function getAllProducts()
    {
        $db = DB::getInstance();
        return $db->get('Products', [1, '=', 1])->results();
    }

    protected function insertProduct($productName, $price, $img_url)
    {
        $this->_db = DB::getInstance();
        $fields = [
            'name' => $productName,
            'price' => $price,
            'img_url' => $img_url,
        ];
        $this->_db->insert('Products', $fields);
    }
}