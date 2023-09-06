<?php

require_once __DIR__ . '/router.php';

//Note: Vi mangler .htacess, når den er importet til root i projektet virker routerne.

#User routes

#Get all products
get('/auth/product', 'products.php');

#Get index
get('/securityphp', 'index.php');

#Get product by id.
get('/auth/product/$id', 'products.php');

#Delete user, vi bliver nok nødt til at sepereate det i to, da vi ikke kan bruge get og post på samme route. 
post('/auth/deleteUser', 'User.php');

//Update username
post('/auth/updateusername', 'classes/User.php');




#Admin routes

#Create product, vi bliver nødt til at sepereate det i to, da vi ikke kan bruge get og post på samme route.
post('/auth/product/create', 'products.php');

#Delete product, som på de andre bliver vi nok nødt til at sepereate det i to, da vi ikke kan bruge get og post på samme route.
post('/auth/product/$id', 'product.php');

#Update price on a product, samme her.
post('/auth/updateprice', 'products.php');

#Get user by id, her bliver nok også nødt til at lave seperat klasse.
get('/auth/user/$id', 'User.php');


#Other routes
any('/404', 'views/404.php');


?>