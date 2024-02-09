<?php

namespace KooijmanInc\SuzieBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SuzieExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {dump($configs);
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        foreach (array('host', 'user', 'pass', 'port', 'charset', 'dbname') as $attribute) {
            $container->setParameter('suzie.connection.' . $attribute, $config['connection'][$attribute]);
        }

        $loader = new Loader\YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}