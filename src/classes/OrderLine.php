<?php
require_once("src/core/init.php");
class OrderLine
{

    protected $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function getOrderlinesByOrderId($id)
    {
        $db = DB::getInstance();
        return $db->query("SELECT * FROM orderline join products on orderline.product_id = products.id  where order_id = ?", array($id))->results();
    }
}