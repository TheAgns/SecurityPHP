<?php
require_once("src/core/init.php");
class Order
{

    protected $_db;
    public function __construct()
    {
        $this->_db = DB::getInstance();
    }

    protected function getAllOrders()
    {
        $db = DB::getInstance();
        return $db->get('orders', [1, '=', 1])->results();
    }

    protected function getOrderById($id)
    {
        $db = DB::getInstance();
        return $db->get('orders', ['id', '=', $id])->first();
    }

    protected function insertOrder($userID, $total, $comment)
    {
        $this->_db = DB::getInstance();
        $fields = [
            'user_id' => $userID,
            'total' => $total,
            'comment' => $comment,
            'created' => new DateTime('now')
        ];
        $this->_db->insert('orders', $fields);
    }
}