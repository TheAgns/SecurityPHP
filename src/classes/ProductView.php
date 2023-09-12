<?php

class ProductView extends Product
{
    public function showProductDetails()
    {

    }

    public function showAllProducts($data)
    {

        foreach ($data as $product) {
            $html = '<div class="product-card">';
            $html .=
                '<img src="' . $product['img_url'] .
                '" alt="' . $product['name'] .
                '" class="product-image"><br>' .
                '<h2>' . $product['name'] . '</h2>' .
                '<p>Price: ' . number_format($product['price'], 2) . ',- ddk</p>' .
                '<form method="post">' .
                '<input type="hidden" name="product_id" value="' . $product['id'] . '">' .
                '<button type="submit" class="buy-button">Buy</button>' .
                '</form>' .
                '</div>';

            echo $html;
        }


    }
}