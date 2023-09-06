<!-- product-list.php -->
<h2>Product List</h2>
<ul>
    <?php foreach ($products as $product): ?>
        <li><?= $product['name']; ?></li>
    <?php endforeach; ?>
</ul>
