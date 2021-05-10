<?php

use Company\Calculator\Framework\ServiceProvider\ApplicationServiceProvider;
use Company\Calculator\Framework\ServiceProvider\ControllerServiceProvider;
use Company\Calculator\Framework\ServiceProvider\MiddlewareServiceProvider;
use Company\Calculator\Framework\ServiceProvider\RouteServiceProvider;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

$container = (new ContainerBuilder())
    ->useAutowiring(false)
    ->useAnnotations(false)
    ->build();
AppFactory::setContainer($container);
$app = AppFactory::create();

(new ApplicationServiceProvider())->register($container);
(new ControllerServiceProvider())->register($container);
(new MiddlewareServiceProvider())->register($container);
(new RouteServiceProvider())->registerRoutes($app);

$app->run();
