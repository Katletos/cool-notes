<?php

$routes = require('routes.php');

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes))
    {
        require $routes[$uri];
    }
    else
    {
        abort(Response::NOT_FOUND);
    }
}

function abort(int $code = 404): void
{
    http_response_code($code);
    require "views/$code.php";
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($uri, $routes);