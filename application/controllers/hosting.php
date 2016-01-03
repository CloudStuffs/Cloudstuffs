<?php

/**
 * Description of hosting
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Hosting extends Manage {
    
    public function vps() {
    	$this->seo(array(
            "title" => "Managed VPS Hosting Delhi",
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
    public function wordpress() {
        $this->seo(array(
            "title" => "Wordpress Hosting",
            "view" => $this->getLayoutView()
        ));
    }
    public function drupal() {
        $this->seo(array(
            "title" => "Drupal Hosting",
            "view" => $this->getLayoutView()
        ));
    }
    public function magento() {
        $this->seo(array(
            "title" => "Magento Hosting",
            "view" => $this->getLayoutView()
        ));
    }
    public function joomla() {
        $this->seo(array(
            "title" => "Magento Hosting",
            "view" => $this->getLayoutView()
        ));
    }

    public function cloud_vps() {
        $this->seo(array(
            "title" => "Magento Hosting",
            "view" => $this->getLayoutView()
        ));
    }
}
