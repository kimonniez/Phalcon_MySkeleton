<?php

use Phalcon\Mvc\Controller;
use Phalcon\Session as Session;

class ControllerBase extends Controller{

	public function initialize(){
		if($this->authorizer->getAuth()){
			$user = $user = Users::findFirst(array(
					'id = ?0',
					'bind' => array($this->authorizer->getAuth()['id'])
				));
			$this->view->user = $user;
		}
	}
	
}
