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
        "pattern" => "adnetwork",
        "controller" => "home",
        "action" => "adnetwork"
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
    ),
    array(
        "pattern" => "hosting/cloud_vps",
        "controller" => "home",
        "action" => "cloud_vps"
    ),
    array(
        "pattern" => "hosting/features",
        "controller" => "home",
        "action" => "features"
    ),
    array(
        "pattern" => "hosting/cPanel",
        "controller" => "home",
        "action" => "cPanel"
    ),
    array(
        "pattern" => "hosting/shared",
        "controller" => "home",
        "action" => "shared"
    ),
    array(
        "pattern" => "hosting/cloud_vps",
        "controller" => "home",
        "action" => "cloud_vps"
    ),
    array(
        "pattern" => "hosting/dedicated",
        "controller" => "home",
        "action" => "dedicated"
    ),
    array(
        "pattern" => "hosting/open_source",
        "controller" => "home",
        "action" => "open_source"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
