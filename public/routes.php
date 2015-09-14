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
    ),
    array(
        "pattern" => "hosting",
        "controller" => "home",
        "action" => "hosting"
    ),
    array(
        "pattern" => "online-marketing",
        "controller" => "home",
        "action" => "onlineMarketing"
    ),
    array(
        "pattern" => "professional-email",
        "controller" => "home",
        "action" => "professionalEmail"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
