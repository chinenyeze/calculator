<?php

namespace Company\Calculator\Framework\ServiceProvider;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Framework\Controller\Calculator\PostCalculate;
use Company\Calculator\Framework\Validator\Calculator\PostCalculateValidator;
use DI\Container;

class ControllerServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container->set(PostCalculate::class, fn() => new PostCalculate(
            $container->get(CalculatorService::class),
            new PostCalculateValidator(),
        ));
    }
}
