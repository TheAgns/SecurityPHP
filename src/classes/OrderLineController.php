<?php

class OrderLineController extends OrderLine
{
    
    public function __construct()
    {

    }

    public function createOrderLine($order_id)
    {
        $this->insertOrderLine($order_id);
    }

    public function getOrderLines()
    {
        return $this->getAllOrderLines();
    }

    public function getOrderOrderLine($id){
        return $this->getOrdersProducts($id);
    }
}