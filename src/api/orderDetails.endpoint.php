<?php
require_once('src/core/init.php');

$validate = new Validate();
if (Session::exists(Config::Get("sessions/username")) && $validate->hasPermission("user")) {
    
    $orderController = new OrderController();
    $order = $orderController->getOrder($id);

    $orderLineController = new OrderLineController();
    $orderLines = $orderLineController->getOrderlines($id);

    if ($order['user_id'] == Session::get(Config::get("sessions/userid"))) {
        $orderView = new OrderView();
        $orderView->showOrderDetails($order, $orderLines);
    } else {
        Redirect::to("/securityphp/404");
        exit();
    }
} else if (Session::exists(Config::Get("sessions/username")) && $validate->hasPermission("admin")) {
    $orderController = new OrderController();
    $order = $orderController->getOrder($id);

    $orderLineController = new OrderLineController();
    $orderLines = $orderLineController->getOrderlines($id);

    $orderView = new OrderView();
    $orderView->showOrderDetails($order, $orderLines);
} else {
    Redirect::to("/securityphp");
}
?>