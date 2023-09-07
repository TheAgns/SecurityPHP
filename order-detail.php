<?php
require_once('src/core/init.php');

$orderController = new OrderController();
$order = $orderController->getOrder(1);

$orderView = new OrderView();
$orderView->showOrderDetails($order);
?>