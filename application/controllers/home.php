<?php

/**
 * The Default Example Controller Class
 *
 * @author Faizan Ayubi
 */
use Shared\Controller as Controller;

class Home extends Controller {

    public function index() {
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
    
    public function allproducts() {
        $this->seo(array(
            "title" => "All Products",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function contact() {
        $this->seo(array(
            "title" => "Contact Us",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function support() {
        $this->seo(array(
            "title" => "Support",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function solutions() {
        $this->seo(array(
            "title" => "Buisness Enterprise Solutions CloudStuffs Provide",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function about() {
        $this->seo(array(
            "title" => "Buisness Enterprise Solutions CloudStuffs Provide",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function hosting() {
        $this->seo(array(
            "title" => "Managed Hosting",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function onlineMarketing() {
        $this->seo(array(
            "title" => "Running Best Online Camapigns",
            "view" => $this->getLayoutView()
        ));
    }
    
    public function professionalEmail() {
        $this->seo(array(
            "title" => "Get free professional Email",
            "view" => $this->getLayoutView()
        ));
    }
    
}
