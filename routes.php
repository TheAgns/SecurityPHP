<?php
require_once __DIR__ . '/router.php';

# MAIN INDEX

get('/securityphp', 'index.php');

# SIGN UP
// Signs up a new User
post('/securityphp/signup', 'src/api/signup.endpoint.php');

# PRODUCTS
// Show list of products
get('/securityphp/products', 'product-list.php');

// Rediret to create.php page
get('/securityphp/create', 'createproduct.php');

// Get product details


// Creates the new product
post('/securityphp/create', 'src/api/createProduct.endpoint.php');

# ADMIN

#Create product, vi bliver nødt til at sepereate det i to, da vi ikke kan bruge get og post på samme route.
//post('/auth/product/create', 'src/classes/CreateProduct.php');

#Delete product, som på de andre bliver vi nok nødt til at sepereate det i to, da vi ikke kan bruge get og post på samme route.
post('/auth/product/$id', 'product.php');

#Update price on a product, samme her.
post('/auth/updateprice', 'products.php');

#Get user by id, her bliver nok også nødt til at lave seperat klasse.
get('/auth/user/$id', 'User.php');


#Other routes
any('/404', 'views/404.php');


?>