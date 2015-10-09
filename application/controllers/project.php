<?php

/**
 * Description of project
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Project extends Admin {
    
    public function all() {
    	$this->seo(array(
            "title" => "All Projects Developed by US",
            "view" => $this->getLayoutView()
        ));
    }
}
