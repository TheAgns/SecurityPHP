<?php
require_once 'DB.php';

class ProductModel {
    public function getAllProducts() {
        $db = DB::getInstance();
        return $db->get('Products', [1, '=', 1])->results();
    }
}