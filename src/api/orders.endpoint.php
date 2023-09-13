<?php
require_once('src/core/init.php');

$validate = new Validate();
if (Session::exists(Config::get("sessions/username")) && $validate->hasPermission("admin")) {
    $orderController = new OrderController();
    $orders = $orderController->getOrders();

    $orderView = new OrderView();
    $orderView->showAllOrders($orders);
} else {
    Redirect::to("/securityphp/404");
}

?>