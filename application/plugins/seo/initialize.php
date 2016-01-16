<?php

// initialize seo
include("seo.php");

$seo = new SEO(array(
    "title" => "CloudStuff",
    "keywords" => "Application Support and Application Development" ,
    "description" => "We are internet company in india",
    "author" => "Faizan Ayubi",
    "robots" => "INDEX,FOLLOW",
    "photo" => CDN . "images/logo.png"
));

Framework\Registry::set("seo", $seo);