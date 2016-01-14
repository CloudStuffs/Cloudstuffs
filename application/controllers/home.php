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

            $from = RequestMethods::post("name"). ",<" . RequestMethods::post("email").">";
            $to = "faizan@cloudstuff.tech";
            $subject = " Mail From Cloud stuff Page, :".RequestMethods::post("phone");
            $message= RequestMethods::post("message");

            $header = "From: ".$from."\r\n"; 
            $header.= "MIME-Version: 1.0\r\n"; 
            $header.= "Content-Type: text/plain; charset=utf-8\r\n"; 
            $header.= "X-Priority: 1\r\n"; 

            if(mail($to, $subject, $message, $header)){
                $view->set("message", "Your message has been received, we will contact you within 24 hours.");
            }
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

    public function adnetwork() {
        $this->seo(array(
            "title" => "Buy AdNetwork DSP",
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

    public function features() {
        $this->seo(array(
            "title" => "Features",
            "description" => "Features of CloudStuffs Managed VPS",
            "view" => $this->getLayoutView()
        ));
    }

    public function cPanel() {
        $this->seo(array(
            "title" => "Your Company customized cPanel",
            "description" => "Features of CloudStuffs cPanel",
            "view" => $this->getLayoutView()
        ));
    }


    public function cloud_vps() {
        $this->seo(array(
            "title" => "Managed Cloud VPS",
            "view" => $this->getLayoutView()
        ));
    }

    public function shared() {
        $this->seo(array(
            "title" => "Shared Hosting",
            "view" => $this->getLayoutView()
        ));
    }

    public function dedicated() {
        $this->seo(array(
            "title" => "Dedicated Hosting",
            "view" => $this->getLayoutView()
        ));
    }

    public function open_source() {
        $this->seo(array(
            "title" => "Open Source Apps Hosting",
            "view" => $this->getLayoutView()
        ));
    }
}
