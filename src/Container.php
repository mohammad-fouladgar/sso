<?php

namespace Fouladgar\SSO;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class Container
{
    /**
     * @var ContainerBuilder
     */
    private ContainerBuilder $containerBuilder;

    public function __construct()
    {
        $this->containerBuilder = new ContainerBuilder();
    }

    public function load()
    {
        $this->bindClassed();
        return $this->containerBuilder;
    }

    private function bindClassed()
    {
        $this->containerBuilder->register('Fouladgar\SSO\Controllers\AuthController', 'Fouladgar\SSO\Controllers\AuthController');
    }
}