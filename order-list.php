<?php
require_once('src/core/init.php');

$orderController = new OrderController();
$orders = $orderController->getOrders();

$orderView = new OrderView();
$orderView->showAllOrders($orders);
?>