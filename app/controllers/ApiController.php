<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Session as Session;

class ApiController extends Controller{

	protected $_post;
	protected $_r;

	public function initialize(){
		$this->view->setRenderLevel(View::LEVEL_NO_RENDER);
		if (!$this->request->isPost()) {
			$this->_sendJSONError('POST expected');
		}

		$this->_post = $this->request->getJsonRawBody(true);
		$this->_r = $this->r->initialize($this->_post);
	}

	public function indexAction(){

	}

	public function createUserAction(){

		$expectedFields = [
							'email',
							'password'
						];

		$isPostCorrect = $this->r->validateRequest($expectedFields);

		if ($isPostCorrect === true) {
			$email = $this->r->getPost('email', 'email');
			$password = $this->r->getPost('password');			
//$this->_sendJSON(['success' => true, 'message' => $email]);
			if ($this->usersHelper->validateUserFields($email, 'email')) {

				if ($this->usersHelper->validateUserFields($password, 'password')) {

					$userCreated = $this->usersHelper->createUser($email, $password);

					if ($userCreated) {
						$this->_sendJSON(['success' => true, 'message' => 'User created']);
					} else {
						$this->_sendJSONError(false, 'User creation failed');
					}

				} else {
					$this->_sendJSONError(false, 'Password must be a string longer than 0 symbols');
				}
				
			} else {
				$this->_sendJSONError(false, 'Email is incorrect');
			}
		} else {
			$this->_sendJSONError('Missed params ' . $isPostCorrect);
		}
		
	}

	public function getUsersAction() {
		$expectedFields = [
							'offset',
							'count'
						];

		$isPostCorrect = $this->r->validateRequest($expectedFields);

		if ($isPostCorrect === true) {
			$offset = $this->r->getPost('offset', 'int');
			$count = $this->r->getPost('count', 'int');

			$users = Users::find(['limit' => ['number' => $count, 'offset' => $offset]]);
			$usersTotalCount = Users::count();

			$this->_sendJSON(['success' => true, 'users' => $users->toArray(), 'totalCount' => $usersTotalCount]);
		} else {
			$this->_sendJSONError('Missed params ' . $isPostCorrect);
		}
	}

	public function getUserInfoAction() {
		$expectedFields = [
							'user_id'
						];

		$isPostCorrect = $this->r->validateRequest($expectedFields);

		if ($isPostCorrect === true) {
			$userId = $this->r->getPost('user_id', 'int');

			$user = Users::findFirst(['user_id = ?0', 'bind' => [$userId]]);

			if ($user) {
				$this->_sendJSON(['success' => true, 'user' => $user->toArray()]);
			}
		} else {
			$this->_sendJSONError('Missed params ' . $isPostCorrect);
		}
	}

	public function editUserAction(){
		$expectedFields = [
							'name',
							'email',
							'approved_email',
							'approved_email_code',
							'is_active'
						];

		$isPostCorrect = $this->r->validateRequest($expectedFields);

		if ($isPostCorrect === true) {
			
		} else {
			$this->_sendJSONError('Missed params ' . $isPostCorrect);
		}
	}

	public function templateAction() {
		$expectedFields = [
							'field'
						];

		$isPostCorrect = $this->r->validateRequest($expectedFields);

		if ($isPostCorrect === true) {
			$field = $this->r->getPost('field');

			$data = [];

			$this->_sendJSON(['success' => true, 'data' => $data]);
		} else {
			$this->_sendJSONError('Missed params ' . $isPostCorrect);
		}	
	}
		
	protected function _sendJSON($data, $statusCode = 200) {
        $this->response->setStatusCode($statusCode);
        $content = json_encode($data);

        /*$this->_log_file = realpath(dirname(__FILE__).'/../../../').'/logs/requests.log';
		@file_put_contents($this->_log_file, '['.date('d-m-Y H:i:s', time()).']' . ' RESPONSE : ' . $content. "\n\r\n\r", FILE_APPEND);*/

        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setContent($content);
        $this->response->send();
        die();
    }

    protected function _sendJSONError($message) {

    	$data = [
    		'success' => false,
    		'message' => $message
    	];

    	$this->_sendJSON($data);
    }




}
