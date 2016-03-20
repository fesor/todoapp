<?php

use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/app/autoload.php';
include_once __DIR__.'/var/bootstrap.php.cache';

$env = getenv('SYMFONY_ENV') ?: 'prod';
$kernel = new AppKernel($env, 'prod' !== $env);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
