<?php

namespace KooijmanInc\SuzieBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('suzie');

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('connection')
            ->children()
            ->scalarNode('host')->defaultValue('')->end()
            ->scalarNode('user')->defaultValue('')->end()
            ->scalarNode('pass')->defaultValue('')->end()
            ->scalarNode('port')->defaultValue('3306')->end()
            ->scalarNode('charset')->defaultValue('utf8mb4')->end()
            ->scalarNode('dbname')->defaultValue('')->end()
            ->end()
            ->end() // connection
            ->end();

        return $treeBuilder;
    }
}