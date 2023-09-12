<?php
require_once("src/core/init.php");
class OrderLine
{

    protected $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function getAllOrderLines()
    {
        $db = DB::getInstance();
        return $db->get('orderLine', [1, '=', 1])->results();
    }

    protected function getOrdersProducts($order_id){
        $db = DB::getInstance();
        //return $db->get('orderLine', ['order_id','=', $order_id])->results();
        /*$stmt = $db->prepare("SELECT * FROM orderline join products on orderline.product_id = products.id  where order_id = ?");
        $stmt->bind_param('i', $order_id);
        return $stmt->execute();*/
        return $db->query("SELECT * FROM orderline join products on orderline.product_id = products.id  where order_id = ?", array($order_id))->results();
    }

    /*protected function insertOrderLine($order_id)
    {
        $this->_db = DB::getInstance();
        $fields = [
            'order_id' => $order_id,
        ];
        $this->_db->insert('orders', $fields);
    }*/
}