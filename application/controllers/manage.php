<?php
/**
 * Description of auth
 *
 * @author Faizan Ayubi
 */
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

class Manage extends Admin {

    /**
     * @readwrite
     */
    protected $_organization;

    /**
     * @readwrite
     */
    protected $_members;
    
    /**
     * @before _secure, manageLayout
     */
    public function index() {
        $this->seo(array("title" => "Dashboard","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $projects = Service::all(array("organization_id = ?" => $this->organization->id), array("property", "bill_id", "created"), "created", "desc", 10, 1);
        $members = Member::count(array("organization_id = ?" => $this->organization->id));
        $tasks = Task::all(array("organization_id = ?" => $this->organization->id), array("created", "description"), "created", "desc", 10, 1);
        $tickets = Ticket::count(array("organization_id = ?" => $this->organization->id));

        $view->set("projects", $projects);
        $view->set("members", $members);
        $view->set("tasks", $tasks);
        $view->set("tickets", $tickets);
    }

    /**
     * @before _secure, manageLayout
     */
    public function team() {
        $this->seo(array("title" => "Dashboard","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $members = Member::all(array("organization_id = ?" => $this->organization->id));
        $view->set("members", $members);
    }

    /**
     * @before _secure, manageLayout
     */
    public function company() {
        $this->seo(array("title" => "Dashboard","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $organization = Organization::first(array("id = ?" => $this->organization->id));
        $view->set("organization", $organization);
    }

    /**
     * @before _secure, manageLayout
     */
    public function profile() {
        $this->seo(array("title" => "Profile","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        if(RequestMethods::post("organization")) {
            $organization = Organization::first(array("id = ?" => $this->organization->id));
            $organization->name = RequestMethods::post("org_name");
            $organization->website = RequestMethods::post("website");
            $organization->details = RequestMethods::post("details");
            $organization->email = RequestMethods::post("org_email");
            $organization->phone = RequestMethods::post("org_phone");

            $organization->save();
        }

        if(RequestMethods::post("user")) {
            $user = User::first(array("id = ?" => $this->user->id));
            $user->name = RequestMethods::post("name");
            $user->email = RequestMethods::post("email");
            $user->phone = RequestMethods::post("phone");

            if(RequestMethods::post("password")) {
                $user->password = sha1(RequestMethods::post("password"));
            }
            
            $user->save();

            $view->set("success", true);
        }
        
    }
    
    public function manageLayout() {
        $this->defaultLayout = "layouts/manage";
        $this->setLayout();

        $session = Registry::get("session");
        $organization = $session->get("organization");
        $members = $session->get("members");

        $this->_organization = $organization;
        $this->_members = $members;

        $this->getActionView()->set("organization", $organization);
        $this->getLayoutView()->set("organization", $organization);
        $this->getActionView()->set("members", $members);
        $this->getLayoutView()->set("members", $members);
    }
}
