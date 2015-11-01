<?php

/**
 * Description of project
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Project extends Manage {

    /**
     * @before _secure, manageLayout
     */
    public function details($id) {
        $this->seo(array("title" => "Project Details","view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        $item = Item::first(array("id = ?" => $id));
        $view->set("item", $item);
    }

    public function item($id) {
        $this->seo(array("title" => "Item","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if (RequestMethods::post("action") == "item") {
            $manager = Member::first(array("user_id = ?" => $this->user->id, "designation = ?" => "manager"));
            if ($manager) {
                $item = new Item(array(
                    "user_id" => $this->user->id,
                    "title" => RequestMethods::post("title"),
                    "details" => RequestMethods::post("details"),
                    "category" => RequestMethods::post("category")
                ));
                $item->save();
            } else{
                die('Unauthorised, Contact your manager');
            }

            self::redirect("/project/item/".$item->id);
        }

        if($id) {
            $item = Item::first(array("id = ?" => $id));
        }

        $view->set("item", $item);
    }
    
    public function all() {
    	$this->seo(array("title" => "All Projects Developed by US","view" => $this->getLayoutView()));
        $view = $this->getActionView();
    }

    /**
     * @before _secure, manageLayout
     */
    public function create() {
        $this->seo(array("title" => "Create Project", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if(RequestMethods::post("action") == "project") {
            $bill = new Bill(array(
                "amount" => RequestMethods::post("amount"),
                "duedate" => RequestMethods::post("duedate"),
                "type" => "invoice"
            ));
            $bill->save();

            $service = new Service(array(
                "user_id" => $this->user->id,
                "organization_id" => $this->organization->id,
                "property" => "item",
                "property_id" => RequestMethods::post("item_id"),
                "bill_id" => $bill->id,
                "period" => RequestMethods::post("period")
            ));
            $service->save();

            if (RequestMethods::post("comment")) {
                $comment = new Comment(array(
                    "user_id" => $this->user->id,
                    "organization_id" => $this->organization->id,
                    "property" => "service",
                    "property_id" => $service->id,
                    "details" => RequestMethods::post("comment")
                ));
                $comment->save();
            }

            self::redirect("/project/manage");
        }

        $items = Item::all(array("live = ?" => true), array("id", "title"));
        $view->set("items", $items);
    }

    /**
     * @before _secure, manageLayout
     */
    public function manage() {
    	$this->seo(array("title" => "Manage Projects", "view" => $this->getLayoutView()));
    	$view = $this->getActionView();

        $page = RequestMethods::get("page", 1);
        $limit = RequestMethods::get("limit", 10);
        $where = array("organization_id = ?" => $this->organization->id, "property = ?" => "item");
    	$projects = Service::all($where, array("property_id", "bill_id", "id", "period", "created", "live"), "created", "desc", $limit, $page);
        $count = Service::count($where);

        $view->set("projects", $projects);
        $view->set("count", $count);
        $view->set("page", $page);
        $view->set("limit", $limit);
    }

    /**
     * @before _secure, manageLayout
     */
    public function tasks() {
        $this->seo(array("title" => "Manage Task", "view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $tasks = Task::all(array("organization_id = ?" => $this->organization->id));
        $view->set("tasks", $tasks);
    }

}
