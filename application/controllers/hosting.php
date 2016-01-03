<?php

/**
 * Description of hosting
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Hosting extends Manage {
    
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
