<?php

/**
 * Description of Finance
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;

class Finance extends Manage {
    
    public function invoices() {
    	$this->seo(array("title" => "Invoices","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $projects = Service::all(array("organization_id = ?" => $this->organization->id), array("property", "bill_id", "created"), "created", "desc", 10, 1);
        $view->set("projects", $projects);
    }

    public function payments() {
    	$this->seo(array("title" => "Payments","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
}
