<?php

class OrderController extends Order
{

    public function __construct()
    {

    }

    public function createOrder($userID, $total, $comment)
    {
        $this->insertOrder($userID, $total, $comment);
    }

    public function getOrders()
    {
        return $this->getAllOrders();
    }

    public function getOrder($orderId)
    {
        return $this->getOrderById($orderId);
    }
}