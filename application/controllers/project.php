<?php

/**
 * Description of project
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Project extends Client {
    
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

    public function quotations() {
        $this->seo(array("title" => "Quotations","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
}
