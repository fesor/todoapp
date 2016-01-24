<?php

use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

require_once __DIR__ . '/../app/AppKernel.php';
//require_once __DIR__.'/../app/AppCache.php';

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
