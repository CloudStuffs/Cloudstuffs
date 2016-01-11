<?php
/**
 * Description of auth
 *
 * @author Faizan Ayubi
 */
use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

class Auth extends Controller {
    
    public function login() {
        $this->seo(array("title" => "Login", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        if (RequestMethods::post("action") == "login") {
            $user = User::first(array(
                "email = ?" => RequestMethods::post("email"),
                "password = ?" => sha1(RequestMethods::post("password")),
                "live" => TRUE
            ));
            if ($user) {
                $this->setUser($user);
                $this->session();
            } else {
                $view->set("message", "User not exist or blocked");
            }
        }
    }

    protected function session() {
        $members = Member::all(array("user_id = ?" => $this->user->id));
        if($members) {
            $session = Registry::get("session");
            $session->set("members", $members);

            $organization = Organization::first(array("id = ?" => $members[0]->organization_id));
            foreach ($members as $member) {
                if($member->designation == "manager") {
                    $organization = Organization::first(array("id = ?" => $member->organization_id));
                    $session->set("manager", $member);
                    break;
                }
            }
            $session->set("organization", $organization);
            
            Bill::convertCurrency("USD", $this->user->currency);
            self::redirect("/manage");
        }
    }

    /**
     * @before _secure
     */
    public function switchOrg($organization_id='') {
        $session = Registry::get("session");
        $members = $session->get("members");

        foreach ($members as $member) {
            if ($member->organization_id == $organization_id) {
                $organization = Organization::first(array("id = ?" => $member->organization_id));
                $session->set("organization", $organization);
            }
        }

        self::redirect("/manage");
    }
    
    public function register() {
        $this->seo(array("title" => "Register", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        
        if (RequestMethods::post("action") == "register") {
            $exist = User::first(array("email = ?" => RequestMethods::post("email")));
            if (!$exist) {
                $user = new User(array(
                    "name" => RequestMethods::post("name"),
                    "email" => RequestMethods::post("email"),
                    "password" => sha1(RequestMethods::post("password")),
                    "phone" => RequestMethods::post("phone"),
                    "currency" => RequestMethods::post("currency", "USD"),
                    "admin" => 0,
                    "live" => 1
                ));
                $user->save();
                $this->setUser($user);

                $organization = new Organization(array(
                    "name" => RequestMethods::post("organization"),
                    "details" => RequestMethods::post("details", ""),
                    "website" => RequestMethods::post("website", ""),
                    "email" => RequestMethods::post("email", ""),
                    "phone" => RequestMethods::post("phone", ""),
                    "image" => ""
                ));
                $organization->save();

                $session = Registry::get("session");
                $session->set("organization", $organization);
                
                $member = new Member(array(
                    "user_id" => $user->id,
                    "organization_id" => $organization->id,
                    "designation" => "director"
                ));
                $member->save();
                $this->session();
            } else {
                $view->set("message", 'Username exists, login from <a href="/admin/login">here</a>');
            }
        }

        if ($this->user) {
            self::redirect("/client");
        }
    }
    
}
