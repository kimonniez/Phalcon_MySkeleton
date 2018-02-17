<?php

class UsersHelper extends Phalcon\Mvc\User\Component
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

		$user->setEmail($mail);
		$user->setPassword($this->security->hash($password));

		try {
            $user->save();
            return true;
        } catch (Exception $e) {
            return false;
        }

	}

    public function validateUserFields($value, $fieldName) {
        switch ($fieldName) {
            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL);
                break;
            case 'password':
                return (mb_strlen($value) > 0) ? true : false;
                break;
            
            default:
                # code...
                break;
        }
    }

    public function unauthorize() {
        $this->session->remove('auth');
    }
}