<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <style>
        .product-card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            text-align: center;
        }
        
        .product-image {
            max-width: 100px;
            max-height: 100px;
        }

        .buy-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php ini_set('display_errors', 1); include 'navbar.php'; ?>
    <?php
    ini_set('display_errors', 1);
    // Dett her skal vi have lavet om til data fra vores DB istdet, bare hardcodede produkter
    $products = [
        [
            'name' => 'Product 1',
            'image' => 'product1.jpg',
            'price' => 12500,
        ],
        [
            'name' => 'Product 2',
            'image' => 'product2.jpg',
            'price' => 5250,
        ],
        [
            'name' => 'Product 3',
            'image' => 'product3.jpg',
            'price' => 15000,
        ],
    ];
    // tjekker om vores cart er sat i sessionen eller instansiere den carten
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Funktion til at atilføje produktet til kurven
    function addToCart($product) {
        $_SESSION['cart'][] = $product;
    }

    // Handle adding products to the cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['product_id']) && isset($products[$_POST['product_id']])) {
            addToCart($products[$_POST['product_id']]);
        }
    }

    foreach ($products as $product_id => $product) {
        echo '<div class="product-card">';
        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" class="product-image"><br>';
        echo '<h2>' . $product['name'] . '</h2>';
        echo '<p>Price: ' . number_format($product['price'], 2) .  ',- ddk</p>';
        echo '<form method="post">';
        echo '<input type="hidden" name="product_id" value="' . $product_id . '">';
        echo '<button type="submit" class="buy-button">Buy</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</body>
</html>
