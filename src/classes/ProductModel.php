<?php

require_once 'DB.php';

class ProductModel {
    public function getAllProducts() {
  
        $db = DB::getInstance();


        $sql = "SELECT * FROM products";


        $db->query($sql);

        if (!$db->error()) {
          
            return $db->results();
        } else {
        
            return [];
        }
    }
}
