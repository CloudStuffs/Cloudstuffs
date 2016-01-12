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
        $m = Member::first(array("organization_id = ?" => $this->organization->id, "designation = ?" => "cloudstuff"), array("user_id"));
        $manager = User::first(array("id = ?" => $m->user_id), array("phone", "name", "email"));
        
        $view->set("manager", $manager);
    }

    /**
     * @before _secure, changeLayout, _admin
     */
    public function organizations() {
        $this->seo(array("title" => "Organizations", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $organizations = Organization::all(array(), array("name", "id"));
        
        $view->set("organizations", $organizations);
    }

    /**
     * @before _secure, changeLayout, _admin
     */
    public function subscribe() {
        $this->seo(array("title" => "Subscribe", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if (RequestMethods::post("title")) {
            $item = new Item(array(
                "user_id" => $this->user->id,
                "title" => RequestMethods::post("title"),
                "details" => RequestMethods::post("details", ""),
                "live" => 1
            ));
            $item->save();
        }

        if (RequestMethods::post("item_id")) {
            $billing = new Billing(array(
                "user_id" => $this->user->id,
                "organization_id" => $this->organization->id,
                "item_id" => RequestMethods::post("item_id"),
                "amount" => RequestMethods::post("amount"),
                "period" => RequestMethods::post("period"),
                "start" => RequestMethods::post("start"),
                "end" => RequestMethods::post("end")
            ));
            $billing->save();

            $member = new Member(array(
                "user_id" => RequestMethods::post("user_id"),
                "organization_id" => $this->organization->id,
                "designation" => "cloudstuff",
                "live" => 1
            ));
            $member->save();
        }

        $items = Item::all(array(), array("title", "id"));
        $managers = User::all(array("admin = ?" => 1), array("name", "id"));
        
        $view->set("items", $items);
        $view->set("managers", $managers);
    }

}