<?php
require_once 'DB.php';

class ProductModel {

    public function getAllProducts() {
        $db = DB::getInstance();
        return $db->get('Products', [1, '=', 1])->results();
    }

    public function insertProduct($data) {
        //$db = DB::getInstance();
    
        $sql = "INSERT INTO Products (name, price, url_image) VALUES (?, ?, ?)";
        $params = [$data['name'], $data['price'], $data['url_image']];
       // return $db->query($sql, $params)->error() ? false : true;
       $this->_db=DB::getInstance();
       $this->_db->insert('Products', $data);

    }
}