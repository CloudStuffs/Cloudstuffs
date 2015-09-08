<?php

/**
 * The Default Example Controller Class
 *
 * @author Faizan Ayubi
 */
use Framework\Controller as Controller;

class Home extends Controller {

    public function index() {
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }
    
    public function allproducts() {
        
    }
    
    public function contact() {
        
    }
    
    public function support() {
        
    }
    
    public function solutions() {
        
    }
    
    public function about() {
        
    }
    
}
