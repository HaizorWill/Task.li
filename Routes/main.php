<?php
require "../App/Http/Router/Router.php";
use App\Http\Router\Router;

Router::get('/public/index.php/', function() {
    echo "This is the homepage";
});

Router::dispatch();
?>