<?php
date_default_timezone_set('Europe/Moscow');
error_reporting(E_ALL);
try {
    $config = new Phalcon\Config\Adapter\Ini('../app/config/config.ini' );
    //Register an autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->viewsDir,
        $config->application->pluginsDir,
        $config->application->libraryDir,
        $config->application->mappersDir,
        $config->application->cacheDir,
    ))->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    $di->set('db', function() use ($config) {
        return new \Phalcon\Db\Adapter\Pdo\Postgresql(array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->dbname
        ));
    });

    //Setting up the view component
    $di->set('view', function() use ($config){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir($config->application->viewsDir);
        return $view;
    });

    $di->set('router', function() use ($config) {
        return include $config->application->routerPath;
    });

    $di->set('flashSession', function(){
        $flash = new \Phalcon\Flash\Session(array(
            'error' => 'alert alert-danger',
            'success' => 'alert alert-success',
            'notice' => 'alert alert-warning',
        ));
        return $flash;
    });

    $di->set('usersHelper', function(){
        return new UsersHelper();
    });

    $di->set('registry', function(){
        $registry = new \Phalcon\Registry();
        return $registry;
    });

    $di->set('cookies', function() {
        $cookies = new Cookies();
        $cookies->useEncryption(true); 
        return $cookies;
    });

    $di->set('crypt', function() {
        $crypt = new Phalcon\Crypt();
        $crypt->setKey('#_+d//*(*&f|;76ffFfeesbe%6$');
        return $crypt;
    });

    $di->set('dispatcher', function() use ($di) {
        //Obtain the standard eventsManager from the DI
        $eventsManager = $di->getShared('eventsManager');

        //Uncomment for ACL enable
        //Instantiate the Security plugin
        //$security = new Security($di);
        //Listen for events produced in the dispatcher using the Security plugin
        //$eventsManager->attach('dispatch', $security);


        $dispatcher = new Phalcon\Mvc\Dispatcher();
        //Bind the EventsManager to the Dispatcher
        $dispatcher->setEventsManager($eventsManager);

        return $dispatcher;
    });

    $di->set('session', function() {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });



    /*$di->set('session', function(){

        $memcache = new Phalcon\Session\Adapter\Memcache(array(
            'host'          => '127.0.0.1',     // mandatory
            'port'          => 11211,           // optional (standard: 11211)
            'lifetime'      => 8600,            // optional (standard: 8600)
            'prefix'        => 'my-app',         // optional (standard: [empty_string]), means memcache key is my-app_31231jkfsdfdsfds3
            'persistent'    => false            // optional (standard: false)
        ));
        $memcache->start();
        return $memcache;
    });
    */

    /*$di->set('memcache', function() {
        //Cache data for one day by default
        // по умолчанию на один день
        $frontCache = new \Phalcon\Cache\Frontend\Output(array(
            "lifetime" => 3600 * 24
        ));
        //Memcached connection settings
        $cache = new \Phalcon\Cache\Backend\Memcache($frontCache, array(
            "host" => "localhost",
            "port" => "11211"
        ));
        return $cache;
    });
    */

    //Handle the request

    $di->set('r', function() {
        return new R();
    });

    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}