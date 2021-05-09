<?php

namespace Company\Calculator\Framework\ServiceProvider;

use Company\Calculator\Framework\Controller\Calculator\PostCalculate;
use Slim\App;

class RouteServiceProvider
{
    /**
     * @param App $app
     */
    public function registerRoutes(App $app): void
    {
        $app->post('/calculate', PostCalculate::class);
    }
}
