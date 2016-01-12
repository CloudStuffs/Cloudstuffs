<?php

/**
 * Description of Manage
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Support extends Manage {

	public function create() {
		$this->seo(array("title" => "Create ticket", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
	}

	public function manage() {
		$this->seo(array("title" => "Manage ticket", "view" => $this->getLayoutView()));
        $view = $this->getActionView();
	}
}
