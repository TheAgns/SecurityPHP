<?php

class OrderLineController extends OrderLine
{

    public function __construct()
    {

    }

    public function getOrderlines($orderId)
    {
        return $this->getOrderlinesByOrderId($orderId);
    }
}