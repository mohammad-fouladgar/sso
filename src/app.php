<?php
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

$fileLocator = new FileLocator(array(__DIR__));
$loader = new YamlFileLoader($fileLocator);
$routes = $loader->load('routes.yaml');

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($context->getPathInfo());

[$controller, $method] = explode('::', $parameters['controller']);

$SSOContainer = new \Fouladgar\SSO\Container();
/** @var ContainerBuilder $container */
$container = $SSOContainer->load();

return $container->get($controller)->{$method}();