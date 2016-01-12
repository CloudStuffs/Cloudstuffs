<?php

/**
 * Description of Manage
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Manage extends Admin {

	/**
     * @before _secure, changeLayout, _admin
     */
    public function index() {
        $this->seo(array("title" => "Dashboard", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
        $now = strftime("%Y-%m-%d", strtotime('now'));
        
        $view->set("now", $now);
    }
}