<?php

namespace KooijmanInc\SuzieBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class SuzieExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
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