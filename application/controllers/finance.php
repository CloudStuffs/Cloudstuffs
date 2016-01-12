<?php

/**
 * Description of Finance
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Finance extends Manage {

    /**
     * @before _secure, changeLayout
     */
    public function billing() {
        $this->seo(array("title" => "Items Billing", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $page = RequestMethods::get("page", 1);
        $limit = RequestMethods::get("limit", 10);
        $billings = Billing::all(array("organization_id = ?" => $this->organization->id), array("item_id", "amount", "period", "start", "end", "id"), "created", "desc", $limit, $page);
        $count = Billing::count(array("organization_id = ?" => $this->organization->id));
        
        $view->set("billings", $billings);
        $view->set("page", $page);
        $view->set("limit", $limit);
        $view->set("count", $count);
    }
    
    /**
     * @before _secure, changeLayout
     */
    public function invoices($billing_id) {
    	$this->seo(array("title" => "Invoices","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $page = RequestMethods::get("page", 1);
        $limit = RequestMethods::get("limit", 10);
        $invoices = Invoice::all(array("organization_id = ?" => $this->organization->id, "billing_id = ?" => $billing_id), array("*"), "created", "desc", $limit, $page);
        $count = Invoice::count(array("billing_id = ?" => $billing_id));
        
        $view->set("invoices", $invoices);
        $view->set("page", $page);
        $view->set("limit", $limit);
        $view->set("count", $count);
    }

    /**
     * @before _secure, changeLayout
     */
    public function payments() {
    	$this->seo(array("title" => "Payments","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $invoices = Invoice::all(array("organization_id = ?" => $this->organization->id, "live = ?" => 1));
        $view->set("invoices", $invoices);
    }
}
