<?php
require_once('src/core/init.php');

$validate = new Validate();
if (Session::exists(Config::Get("sessions/username")) && $validate->hasPermission("user")) {
    $order_id = escape($_GET["id"]);
    $orderController = new OrderController();
    $order = $orderController->getOrder($order_id);

    $orderLineController = new OrderLineController();
    $orderLines = $orderLineController->getOrderlines($order_id);

    if ($order['user_id'] == Session::get(Config::get("sessions/userid"))) {
        $orderView = new OrderView();
        $orderView->showOrderDetails($order, $orderLines);
    } else {
        Redirect::to("/securityphp/404");
    }
} else if (Session::exists(Config::Get("sessions/username")) && $validate->hasPermission("admin")) {
    $order_id = escape($_GET["id"]);
    $orderController = new OrderController();
    $order = $orderController->getOrder($order_id);

    $orderLineController = new OrderLineController();
    $orderLines = $orderLineController->getOrderlines($order_id);

    $orderView = new OrderView();
    $orderView->showOrderDetails($order, $orderLines);
} else {
    Redirect::to("/securityphp");
}
?>