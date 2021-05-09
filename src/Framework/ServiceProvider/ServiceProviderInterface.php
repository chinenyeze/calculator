<?php

namespace Company\Calculator\Framework\ServiceProvider;

use DI\Container;

interface ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void;
}
