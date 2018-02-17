<?php

use Phalcon\Events\Event,
	Phalcon\Mvc\User\Plugin,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Acl;

/**
 * Security
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class Security extends Plugin {

	public function __construct($dependencyInjector) {
		$this->_dependencyInjector = $dependencyInjector;
	}

	public function beforeException(Event $event, Dispatcher $dispatcher, Exception $exception) {		
                
        switch ($exception->getCode()) {
            case \Phalcon\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
            case \Phalcon\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
                $dispatcher->forward(array(
                    'controller' => 'index',
                    'action' => 'route404'
                ));

                return false;
        }
            
	}


	/**
	 * This action is executed before execute any action in the application
	 */
	public function afterDispatch(Event $event, Dispatcher $dispatcher) {

		$auth = $this->session->get('auth');
		if (!$auth) {
			$role = 'Guest';
		} else {
			$role = 'User';
		}
		//die($role);
		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = $this->getAcl();
		//die(print_r($acl));
		$allowed = $acl->isAllowed($role, $controller, $action);
		if ($allowed != Acl::ALLOW) {
			die('Message from Security plugin: You dont have permissions for this action');
			$dispatcher->forward(
				array(
					'controller' => 'index',
					'action' => 'index'
				)
			);
			return false;
		}

	}

	public function getAcl() {
		unset($this->persistent->acl);
		if (!isset($this->persistent->acl)) {

			$acl = new Phalcon\Acl\Adapter\Memory();

			$acl->setDefaultAction(Phalcon\Acl::DENY);

			//Register roles
			$roles = array(
				'guest' => new Phalcon\Acl\Role('Guest'),
				'user' => new Phalcon\Acl\Role('User'),
			);
			foreach ($roles as $role) {
				$acl->addRole($role);
			}
			
			//lUser area resources
			$userResources = array(
				'index' => array('index'),
			);
			foreach ($userResources as $resource => $actions) {
				$acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
			}

			//Public area resources
			$publicResources = array(
				'index' => array('index'),
				'admin' => array('*')
			);
			foreach ($publicResources as $resource => $actions) {
				$acl->addResource(new Phalcon\Acl\Resource($resource), $actions);
			}

			//Grant access to public areas to users, guests and admins
			foreach ($roles as $role) {
				foreach ($publicResources as $resource => $actions) {
					foreach ($actions as $action){						
						$acl->allow($role->getName(), $resource, $action);
					}
				}
			}

			//Grant acess to User area to role User
			foreach ($userResources as $resource => $actions) {
				foreach ($actions as $action){
					$acl->allow('User', $resource, $action);
				}
			}

			//The acl is stored in session, APC would be useful here too
			$this->persistent->acl = $acl;
		}

		return $this->persistent->acl;
	}
}
