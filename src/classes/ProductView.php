<?php
class ProductView extends Product
{
    public function showCreateProductForm()
    {
        echo <<<std
            <head>
                <title>Document</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>

            <body>
                <form method="post" action="/securityphp/create">
                    <div class="field">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="field">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" step="0.01" required>
                    </div>
                    <div class="field">
                        <label for="img_url">Image URL</label>
                        <input type="text" name="img_url" id="img_url" required>
                    </div>
                    <button type="submit">Create Product</button>
                </form>
            </body>
          std;
    }

    public function showAllProducts($data)
    {
        $validate = new Validate();
        if ($validate->hasPermission("admin")) {
            include(SRC_PATH . "/shared/adminheader.php");
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
            include(SRC_PATH . "/shared/adminheader.php");
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