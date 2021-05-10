<?php

namespace Company\Calculator\Framework\ServiceProvider;

use DI\Container;
use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

class MiddlewareServiceProvider implements ServiceProviderInterface
{
    /**
     * Load middlewares
     * @param Container $container
     */
    public function register(Container $container): void
    {
        // Twig templates
        $container->set(Twig::class, function () {
            $twigSettings = [
                // Template paths
                'paths'   => [
                    __DIR__ . '/../../../templates',
                ],
                // Twig environment options
                'options' => [
                    'cache_enabled' => false, // Enable for production
                    //'cache_path'    => __DIR__ . '/../../../tmp/twig',
                ],
            ];

            $options          = $twigSettings['options'];
            $options['cache'] = $options['cache_enabled'] ? $options['cache_path'] : false;

            return Twig::create($twigSettings['paths'], $options);
        });

        $container->set(TwigMiddleware::class, function (Container $container) {
            return TwigMiddleware::createFromContainer(
                $container->get(App::class),
                Twig::class,
            );
        });
    }
}
