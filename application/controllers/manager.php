<?php

/**
 * Description of issue
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Manager extends Admin {
    
    public function all() {
    	$this->seo(array(
            "title" => "All Manager",
            "view" => $this->getLayoutView()
        ));
    }
}
