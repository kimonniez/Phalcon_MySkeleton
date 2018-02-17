<?php

use Phalcon\Mvc\View;

class AdminController extends ControllerBase
{

	public function initialize(){
		$this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
	}

    public function indexAction() {
    	
    }

}