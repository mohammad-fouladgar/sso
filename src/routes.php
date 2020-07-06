<?php

use Fouladgar\SSO\Controllers\AuthController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$route = new Route('/auth/login', ['_controller' => AuthController::class, 'method' => 'login']);
$routes = new RouteCollection();
$routes->add('login', $route);

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($context->getPathInfo());

$controller = $parameters['_controller'];
$method = $parameters['method'];

return (new $controller)->{$method}();
