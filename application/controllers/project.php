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
    	$this->seo(array("title" => "All Projects Developed by US","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

    public function manage() {
    	$this->seo(array("title" => "Manage Projects", "view" => $this->getLayoutView()));
    	$view = $this->getActionView();

    	$projects = App::all(array("organization_id = ?" => $this->organization->id));
        $view->set("projects", $projects);
    }
}
