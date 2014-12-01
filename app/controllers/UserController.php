<?php

class UserController extends ControllerBase
{

    public function authorizeAction() {
    	if($this->authorizer->getAuth()){
    		$this->response->redirect('index/index');
    	}
    	$request = $this->request;
    	$mail = $request->getPost('mail');
    	$password = $request->getPost('password');

    	if (!empty($mail) AND !empty($password)){
    		if($this->authorizer->authorize($mail, $password)){
    			$this->flashSession->success('Successfully authorized');
    			$this->dispatcher->forward(array(
    					'controller' => 'index',
    					'action' => 'index'
    				));
    		} else {
    			$this->flashSession->error('Incorrect credentials');
    			$this->dispatcher->forward(array(
    					'controller' => 'index',
    					'action' => 'login'
    				));
    		}
    	} else {
    		$this->flashSession->error('Please enter mail and pasword');
    		$this->dispatcher->forward(array(
    					'controller' => 'index',
    					'action' => 'login'
    				));
    	}
    }

    public function unauthorizeAction() {
    	if($this->authorizer->getAuth()){
    		$this->authorizer->unauthorize();
    		$this->flashSession->success('Good bye');
    	}
    	$this->dispatcher->forward(array(
    					'controller' => 'index',
    					'action' => 'login'
    				));
    }
    
}

