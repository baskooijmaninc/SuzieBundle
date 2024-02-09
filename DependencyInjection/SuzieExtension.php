<?php

namespace KooijmanInc\SuzieBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SuzieExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {dump($configs);dump($container);
        // TODO: Implement load() method.
    }
}