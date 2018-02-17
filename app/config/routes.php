<?php

$router = new Phalcon\Mvc\Router(false);
$router->setUriSource($router::URI_SOURCE_SERVER_REQUEST_URI);
$router->add(
    '/',
    array(
        'controller' => 'index',
        'action' => 'index',
    )
)->setName('root');

$router->add(
    '/:controller/:action',
    array(
        'controller' => 1,
        'action' => 2,
    )
)->setName('baseRoute');

$router->add(
    '/:controller',
    array(
        'controller' => 1,
        'action' => 'index',
    )
)->setName('baseRouteWithoutAction');

$router->notFound(array(
    "controller" => "index",
    "action" => "route404"
));

$router->removeExtraSlashes(true);

return $router;
