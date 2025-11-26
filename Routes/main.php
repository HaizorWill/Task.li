<?php
require "../App/Http/Router/Router.php";
use App\Http\Router\Router;

Router::get('/public/index.php/home', function() {
    echo "This is the homepage";
});

Router::get('/public/index.php/about', function() {
    echo "This is the about page";
});

Router::get('/public/index.php/buy', function() {
    echo "This is the product page";
});

Router::get('/public/index.php/buy/{id}', function($id) {
    echo "This is the page for product $id";
});

Router::dispatch();
?>