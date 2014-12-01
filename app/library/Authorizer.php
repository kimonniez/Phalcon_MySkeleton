<?php

class Authorizer extends Phalcon\Mvc\User\Component
{
	private function _registerSession($user) {
		//die('here');
        $this->session->set('auth', array(
            'id' => $user->getId(),
            'mail' => $user->getMail(),
        ));
    }

    public function getAuth(){
    	$auth = $this->session->get('auth');
    	//die(print_r($auth));
    	if ($auth) {
    		return $auth;
    	} else {
    		return false;
    	}
    }

    public function authorize($mail, $password){
    	$user = Users::findFirst(array(
            "mail = ?0",
            "bind" => array($mail)
        ));

        if($user){
            if($this->security->checkHash($password, $user->getPassword())) {
                $this->_registerSession($user);
                return true;
            }
        }
        return false;
    	//$this->_registerSession($user);
    }

    public function createUser($mail, $password){

		$user = new Users();

		$user->setMail($mail);
		$user->setPassword($this->security->hash($password));

		if (!$user->save()) {
			throw new Exception("Can't create user", 1);
		}
	}

    public function unauthorize() {
        $this->session->remove('auth');
    }
}