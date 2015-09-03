<?php

// define routes

$routes = array(
    array(
        "pattern" => "allproducts",
        "controller" => "home",
        "action" => "allproducts"
    ),
    array(
        "pattern" => "contact",
        "controller" => "home",
        "action" => "contact"
    ),
    array(
        "pattern" => "solutions",
        "controller" => "home",
        "action" => "solutions"
    ),
    array(
        "pattern" => "support",
        "controller" => "home",
        "action" => "support"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
