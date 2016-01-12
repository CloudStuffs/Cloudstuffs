<?php

/**
 * Description of Manage
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Manage extends Admin {

	/**
     * @before _secure, changeLayout
     */
    public function index() {
        $this->seo(array("title" => "Dashboard", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $m = Member::first(array("organization_id = ?" => $this->organization->id, "designation = ?" => "CloudStuff"), array("user_id"));
        $manager = User::first(array("id = ?" => $m->user_id), array("phone", "name", "email"));
        
        $view->set("manager", $manager);
    }

    /**
     * @before _secure, changeLayout
     */
    public function subscribe($organization_id) {
        $this->seo(array("title" => "Dashboard", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $items = Item::all(array(), array("title", "details"));
        
        $view->set("items", $items);
    }

}