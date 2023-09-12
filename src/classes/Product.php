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
        try {
            $db = DB::getInstance();
            return $db->get('Products', [1, '=', 1])->results();
        } catch (Exception $e) {
            throw new Exception("Error fetching products: " . $e->getMessage());
        }
    }

    protected function insertProduct($productName, $price, $img_url)
    {
        try {
            $this->_db = DB::getInstance();
            $fields = [
                'name' => $productName,
                'price' => $price,
                'img_url' => $img_url,
            ];
            $this->_db->insert('Products', $fields);
  
        } catch (Exception $e) {
            throw new Exception("Error inserting product: " . $e->getMessage());
        }
    }
}
?>
