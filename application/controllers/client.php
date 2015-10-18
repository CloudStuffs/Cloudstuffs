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
     * @before _secure, changeLayout
     */
    public function index() {
        $this->seo(array(
            "title" => "Dashboard",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        $click = 0;
        
        $links = Link::all(array("user_id = ?" => $this->user->id), array("item_id", "short", "created"), "created", "desc", 10, 1);
        foreach ($links as $link) {
            $stat = Stat::first(array("link_id = ?" => $link->id), array("shortUrlClicks"));
            if ($stat) {
                $click += $stat->shortUrlClicks;
            }
        }
        
        $view->set("links", $links);
        $view->set("earnings", $this->totalEarnings()["total"]);
        $view->set("pending", $this->totalEarnings()["pending"]);
        $view->set("click", $click);
    }
    
    /**
     * @before _secure, changeLayout
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
     * @before _secure, changeLayout
     */
    public function payments() {
        $this->seo(array(
            "title" => "Payments",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        $view->set("paymens", array());
    }
    
    public function changeLayout() {
        $this->defaultLayout = "layouts/member";
        $this->setLayout();
    }
}
