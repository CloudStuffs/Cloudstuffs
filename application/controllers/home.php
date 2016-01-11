<?php

/**
 * The Default Example Controller Class
 *
 * @author Faizan Ayubi
 */
use Framework\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Home extends Controller {

    public function seo($params = array()) {
        $seo = Registry::get("seo");
        foreach ($params as $key => $value) {
            $property = "set" . ucfirst($key);
            $seo->$property($value);
        }
        $params["view"]->set("seo", $seo);
    }

    public function index() {
        $this->getLayoutView()->set("seo", Framework\Registry::get("seo"));
    }

        public function contact() {
        $this->seo(array(
            "title" => "Contact Us CloudStufft",
            "keywords" => "Ask any question, mail us, contact us",
            "description" => "Any question you have about our service or you have any technical issue just contact us.",
            "view" => $this->getLayoutView()
        ));
        $view = $this->getActionView();
        if (RequestMethods::post("submit") == "Send") {
            $this->notify(array(
                "template" => "message",
                "subject" => "You have received a message",
                "cmessage" => RequestMethods::post("message"),
                "sender" => RequestMethods::post("name"). ", " . RequestMethods::post("email"),
                "user" => User::first(array("id = ?" => 1))
            ));
            $view->set("message", "Your message has been received, we will contact you within 24 hours.");
        }
    }

    public function support() {
        $this->seo(array(
            "title" => "Support",
            "view" => $this->getLayoutView()
        ));
    }

    public function about() {
        $this->seo(array(
            "title" => "Buisness Enterprise Solutions CloudStuffs Provide",
            "view" => $this->getLayoutView()
        ));
    }

    public function affiliates() {
        $this->seo(array(
            "title" => "Why Affiliate?",
            "view" => $this->getLayoutView()
        ));
    }
    public function projects() {
        $this->seo(array(
            "title" => "Our Projects",
            "view" => $this->getLayoutView()
        ));
    }

    public function privacy_policy() {
        $this->seo(array(
            "title" => "Our Privacy Policy",
            "view" => $this->getLayoutView()
        ));
    }

    public function terms_conditions() {
        $this->seo(array(
            "title" => "Terms and Conditions",
            "view" => $this->getLayoutView()
        ));
    }
}
