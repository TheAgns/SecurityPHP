<?php
class ProductView extends Product
{
    public function showProductDetails()
    {

    }

    public function showAllProducts($data)
    {
        $validate = new Validate();
        if ($validate->hasPermission("admin")) {
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
                    '<input type="hidden" name="token" value="' . Token::generate("token") . '">' .
                    '<button type="submit" formaction="/securityphp/products/delete/' . $product['id'] . '" class="buy-button">Delete</button>' .
                    '</form>' .
                    '</div>';
                echo $html;
            }
        } else if ($validate->hasPermission("user")) {
            foreach ($data as $product) {
                $html = '<div class="product-card">';
                $html .=
                    '<img src="' . $product['img_url'] .
                    '" alt="' . $product['name'] .
                    '" class="product-image"><br>' .
                    '<h2>' . $product['name'] . '</h2>' .
                    '<p>Price: ' . number_format($product['price'], 2) . ',- ddk</p>' .
                    '<form action="/secuirtyphp/products/add/$id" method="post">' .
                    '<input type="hidden" name="product_id" value="' . $product['id'] . '">' .
                    '<input type="hidden" name="token" value="' . Token::generate("token") . '">' .
                    '<button type="submit" class="buy-button">Add to Cart</button>' .
                    '</form>' .
                    '</div>';
                echo $html;
            }
        }
    }
}