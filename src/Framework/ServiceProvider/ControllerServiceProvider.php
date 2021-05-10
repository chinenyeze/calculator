<?php

namespace Company\Calculator\Framework\ServiceProvider;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Framework\Controller\Calculator\PostCalculate;
use Company\Calculator\Framework\Validator\Calculator\PostCalculateValidator;
use Company\Calculator\Framework\ViewHandler\Calculator\CalculateView;
use DI\Container;
use Slim\Views\Twig;

class ControllerServiceProvider implements ServiceProviderInterface
{
    /**
     * Load controllers and view handlers
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container->set(CalculateView::class, fn() => new CalculateView(
            $container->get(Twig::class),
        ));

        $container->set(PostCalculate::class, fn() => new PostCalculate(
            $container->get(CalculatorService::class),
            new PostCalculateValidator(),
        ));
    }
}
