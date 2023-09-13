<?php
require_once __DIR__ . '/router.php';

# MAIN INDEX -------

get('/securityphp', 'index.php');

# SIGN UP --------
// Signs up a new User
post('/securityphp/signup', 'src/api/signup.endpoint.php');

# LOGIN ----------

// Logs in a User
post('/securityphp/login', 'src/api/login.endpoint.php');

# LOGOUT -----------

// Logs out a User
get('/securityphp/logout', 'src/api/logout.endpoint.php');

# PRODUCTS ---------

// Show list of products
get('/securityphp/products', 'src/api/products.endpoint.php');


// Redirects to create.php page (ADMIN)
get('/securityphp/create', 'src/api/createProduct.endpoint.php');


// Creates the new product (ADMIN)
post('/securityphp/create', 'src/api/createProduct.endpoint.php');

# Deletes a specific product by id (ADMIN)
post('/securityphp/products/delete/$id', 'src/api/deleteProduct.endpoint.php');

# ORDERS --------------------

// Show list of orders (ADMIN)
get('/securityphp/orders', 'src/api/orders.endpoint.php');

// Show details of one order
get('/securityphp/orders/$id', 'src/api/orderDetails.endpoint.php');

# Other routes
any('/securityphp/404', 'src/errors/404.php');


?>