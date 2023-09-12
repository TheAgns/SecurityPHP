<?php

class OrderLineView extends Order
{
    public function showOrdersProducts($orderLineProducts)
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

        foreach($orderLineProducts as $order){

            echo <<<std
            <tr>
                <td>$order[name]</td>
                <td>$order[price]</td>
                <td>$order[quantity]</td>
            </tr>
            std;
        }

        echo <<<std
        </tbody>
        </table>              
        std;
    }
}