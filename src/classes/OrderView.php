<?php

class OrderView extends Order
{
    public function showOrderDetails($order, $orderLines)
    {
        echo <<<std
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body class="container py-5">
            <div class="col-md-8 offset-md-2">
                <p>Order information</p> 
                <table class="table">
                    <!-- Order info -->
                    <tbody>
                        <tr>
                            <th scope="row">Order ID</th>
                            <td colspan="3">$order[id]</td>
                        </tr>
                        <tr>
                            <th scope="row">User ID</th>
                            <td colspan="3">$order[user_id]</td>
                        </tr>
        std;
        $orderLineView = new orderLineView();
        $orderLineView->showOrderLines($orderLines);

        echo <<<std
                        <tr>
                            <th colspan="2"></td>
                            <th scope="row">Total Price</th>
                            <td colspan="3">$order[total]</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        std;
    }

    public function showAllOrders($data)
    {
        echo <<<std
            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>
            <body class="container py-5">
            <div class="col-md-8 offset-md-2">
                <h2>All Orders</h2> 
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">User id</th>
                            <th scope="col">Created</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                <tbody>
          std;

        foreach ($data as $order) {
            echo <<<std
                <tr>
                  <th scope="row">$order[id]</th>
                  <td>$order[user_id]</td>
                  <td>$order[created]</td>
                  <td>$order[total]</td>
                </tr>
            std;
        }

        echo <<<std
            </tbody>
            </table>
            </div>
            </body>
        std;

    }
}