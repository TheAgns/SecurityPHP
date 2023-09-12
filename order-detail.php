<?php
require_once('src/core/init.php');


$order_id  = escape($_GET["id"]);
$orderController = new OrderController();
$order = $orderController->getOrder($order_id);

$orderLineController = new OrderLineController();
$orderLine = $orderLineController->getOrderOrderLine($order_id);

$orderView = new OrderView();
$orderView->showOrderDetails($order, $orderLine);
?>