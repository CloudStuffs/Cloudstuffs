<?php

/**
 * Description of Finance
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;

class Finance extends Client {
    
    public function invoices() {
    	$this->seo(array("title" => "Invoices","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

    public function payments() {
    	$this->seo(array("title" => "Payments","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }
}
