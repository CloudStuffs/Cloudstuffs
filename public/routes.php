<?php

// define routes

$routes = array(
    array(
        "pattern" => "contact",
        "controller" => "home",
        "action" => "contact"
    ),
    array(
        "pattern" => "about",
        "controller" => "home",
        "action" => "about"
    ),
    array(
        "pattern" => "login",
        "controller" => "auth",
        "action" => "login"
    ),
    array(
        "pattern" => "affiliates",
        "controller" => "home",
        "action" => "affiliates"
    ),
    array(
        "pattern" => "support",
        "controller" => "home",
        "action" => "support"
    ),
    array(
        "pattern" => "projects",
        "controller" => "home",
        "action" => "projects"
    ),
    array(
        "pattern" => "privacy-policy",
        "controller" => "home",
        "action" => "privacy_policy"
    ),
    array(
        "pattern" => "terms&conditions",
        "controller" => "home",
        "action" => "terms_conditions"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
