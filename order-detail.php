<?php
require_once('src/core/init.php');

$order_id  = escape($_GET["id"]);
$orderController = new OrderController();
$order = $orderController->getOrder($order_id);

$orderLineController = new OrderLineController();
$orderLine = $orderLineController->getOrderOrderLine($order_id);

if(Session::exists(Config::Get("sessions/userid"))){
    if($order[0]['user_id'] == Session::get(Config::get("sessions/userid"))){
        $orderView = new OrderView();
        $orderView->showOrderDetails($order, $orderLine);
    }
    else{
        echo 'NO access';
    }
}
else{
    echo 'no session';
}
?>