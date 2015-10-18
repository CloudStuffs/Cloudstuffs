<?php

/**
 * Description of issue
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Issue extends Admin {
    
    public function all() {
    	$this->seo(array(
            "title" => "All Projects Developed by US",
            "view" => $this->getLayoutView()
        ));
    }
}
