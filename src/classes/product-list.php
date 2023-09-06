<?php
require_once('GetAllProducts.php');
require_once('ProductModel.php');
?>
<?php
$getAllProducts = new GetAllProducts();
$products = $getAllProducts->listProducts();
?>

<?php foreach ($products as $product): ?>
    <div class="product-card">
        <img src="<?= $product['url_image']; ?>" alt="<?= $product['name']; ?>" class="product-image"><br>
        <h2><?= $product['name']; ?></h2>
        <p>Price: <?= number_format($product['price'], 2); ?>,- ddk</p>
        <form method="post">
            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
            <button type="submit" class="buy-button">Buy</button>
        </form>
    </div>
<?php endforeach; ?>

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

