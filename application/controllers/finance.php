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
        $billings = Billing::all(array("organization_id = ?" => $this->organization->id), array("item_id", "amount", "period", "start", "end", "created"), "created", "desc", $limit, $page);
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

        $projects = Service::all(array("organization_id = ?" => $this->organization->id), array("property", "bill_id", "created"), "created", "desc", 10, 1);
        $view->set("projects", $projects);
    }

    /**
     * @before _secure, manageLayout
     */
    public function bills() {
        $this->seo(array("title" => "Bills","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $created = RequestMethods::get("created", "");
        $page = RequestMethods::get("page", 1);
        $limit = RequestMethods::get("limit", 10);

        $where = array(
            "organization_id = ?" => $this->organization->id,
            "created LIKE ?" => "%{$created}%"
        );
        $services = Service::all($where, array("property", "bill_id", "property_id", "id"), "created", "desc", $limit, $page);

        $view->set("services", $services);
        $view->set("created", $created);
        $view->set("page", $page);
        $view->set("limit", $limit);
    }

    /**
     * @before _secure, manageLayout
     */
    public function payments() {
    	$this->seo(array("title" => "Payments","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $invoices = Invoice::all(array("organization_id = ?" => $this->organization->id), array("amount", "ref_id", "mode", "bill_id", "created"));
        $view->set("payments", $payments);
    }
}
