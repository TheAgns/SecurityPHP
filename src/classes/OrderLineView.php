<?php

class OrderLineView extends Order
{
    public function showOrderLines($orderLines)
    {
        echo <<<std
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
        std;

        foreach ($orderLines as $orderLine) {
            echo <<<std
            <tr>
                <td>$orderLine[name]</td>
                <td>$orderLine[price]</td>
                <td>$orderLine[quantity]</td>
            </tr>
            std;
        }

        echo <<<std
        </tbody>
        </table>              
        std;
    }
}