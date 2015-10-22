<?php
/**
 * Description of auth
 *
 * @author Faizan Ayubi
 */
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

class Client extends Auth {

    /**
     * @readwrite
     */
    protected $_organization;
    
    /**
     * @before _secure, clientLayout
     */
    public function index() {
        $this->seo(array("title" => "Dashboard","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $projects = App::count(array("organization_id = ?" => $this->organization->id));
        $members = Member::count(array("organization_id = ?" => $this->organization->id));
        $tickets = Ticket::count(array("organization_id = ?" => $this->organization->id, "live = ?" => true));
        $bugs = Bug::count(array("organization_id = ?" => $this->organization->id, "live = ?" => true));

        $view->set("projects", $projects);
        $view->set("members", $members);
        $view->set("tickets", $tickets);
        $view->set("bugs", $bugs);
    }

    /**
     * @before _secure, clientLayout
     */
    public function team() {
        $this->seo(array("title" => "Dashboard","view" => $this->getLayoutView()));
        $view = $this->getActionView();

        $members = Member::all(array("organization_id = ?" => $this->organization->id));
        $view->set("members", $members);
    }
    
    /**
     * @before _secure, clientLayout
     */
    public function profile() {
        $this->seo(array(
            "title" => "Profile",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        $account = Account::first(array("user_id = ?" => $this->user->id));
        if(!$account) {
            $account = new Account();
        }
        
        if (RequestMethods::post('action') == 'saveUser') {
            $user = User::first(array("id = ?" => $this->user->id));
            $user->phone = RequestMethods::post('phone');
            $user->name = RequestMethods::post('name');
            $user->save();
            $view->set("success", true);
            $view->set("user", $user);
        }
        
        if (RequestMethods::get("action") == "saveAccount") {
            $account->user_id = $this->user->id;
            $account->name = RequestMethods::post("name");
            $account->bank = RequestMethods::post("bank");
            $account->number = RequestMethods::post("number");
            $account->ifsc = RequestMethods::post("ifsc");
            
            $account->save();
            $view->set("success", true);
        }
        
        $view->set("account", $account);
    }
    
    /**
     * @before _secure, clientLayout
     */
    public function payments() {
        $this->seo(array(
            "title" => "Payments",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        $view->set("paymens", array());
    }
    
    public function clientLayout() {
        $this->defaultLayout = "layouts/client";
        $this->setLayout();

        $session = Registry::get("session");
        $organization = $session->get("organization");

        $this->_organization = $organization;

        $this->getActionView()->set("organization", $organization);
        $this->getLayoutView()->set("organization", $organization);
    }
}
