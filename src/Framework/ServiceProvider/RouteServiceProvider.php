<?php

namespace Company\Calculator\Framework\ServiceProvider;

use Company\Calculator\Framework\Controller\Calculator\PostCalculate;
use Company\Calculator\Framework\ViewHandler\Calculator\CalculateView;
use Slim\App;

class RouteServiceProvider
{
    /**
     * @param App $app
     */
    public function registerRoutes(App $app): void
    {
        $app->get('/', CalculateView::class);
        $app->post('/calculate', PostCalculate::class);
    }
}
