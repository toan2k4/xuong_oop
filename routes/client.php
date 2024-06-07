<?php 
use Toannguyen\OopPhp3\Controllers\Client\AboutController;
use Toannguyen\OopPhp3\Controllers\Client\ContactController;
use Toannguyen\OopPhp3\Controllers\Client\HomeController;
use Toannguyen\OopPhp3\Controllers\Client\LoginController;
use Toannguyen\OopPhp3\Controllers\Client\ProductController;

// để định nghĩa đc, đầu tiên phải tạo controller trc

// HTTP Method: get , post, put, path, delete, option, head

$router->get('/',               HomeController::class . '@index');
$router->get('/about',          AboutController::class . '@index');


$router->get('/contact',        ContactController::class . '@index');
$router->get('/contact/store',  ContactController::class . '@store');


$router->get('/products',       ProductController::class . '@index');
$router->get('/products/{id}',  ProductController::class . '@detail');

$router->get('/login',        LoginController::class . '@showFormLogin');
$router->post('/handle-login',  LoginController::class . '@login');
$router->get('/logout',  LoginController::class . '@logout');