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
        $member = Member::first(array("user_id = ?" => $this->user->id));
        if($member) {
            $session = Registry::get("session");
            $session->set("member", $member);

            $organization = Organization::first(array("id = ?" => $member->organization_id));
            $session->set("organization", $organization);
            
            //Bill::convertCurrency("USD", $this->user->currency);
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
                    "currency" => RequestMethods::post("currency", "INR"),
                    "admin" => 0,
                    "live" => 1
                ));
                $user->save();
                $this->setUser($user);

                $organization = new Organization(array(
                    "name" => RequestMethods::post("organization"),
                    "details" => RequestMethods::post("details", ""),
                    "website" => RequestMethods::post("website", ""),
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
                $session->set("member", $member);
            } else {
                $view->set("message", 'User exists, login from <a href="/admin/login">here</a>');
            }
        }

        if ($this->user) {
            self::redirect("/manage");
        }
    }

}
