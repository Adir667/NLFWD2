<?php
require_once ("SwitchRouter.php");

$uri = trim($_SERVER['REQUEST_URI'], '/');
$method = $_SERVER['REQUEST_METHOD'];
$path = explode('/', $uri);

if (count($path) > 1) {
    $uri = $path[0];
    $path = $path[1];
} else {
    $path = null;
}

$router = new SwitchRouter();

$router->route($uri, $method, strcasecmp($method, 'POST') === 0
    ? file_get_contents('php://input')
    : null,
    $path
);
