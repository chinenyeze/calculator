<?php

namespace Company\Calculator\Framework\ServiceProvider;

use Company\Calculator\Application\CalculatorService;
use DI\Container;

class ApplicationServiceProvider implements ServiceProviderInterface
{
    /**
     * Load services
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container->set(CalculatorService::class, fn() => new CalculatorService());
    }
}
