<?php

namespace KK\Labs\ChuckConsoleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kk_labs_chuck_console');

        $rootNode
            ->children()
                ->arrayNode('who')
                    ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode('first_name')->defaultValue('Chuck')->end()
                            ->scalarNode('last_name')->defaultValue('Norris')->end()
                        ->end()
                    ->end()//who
                ->scalarNode('timeout')->defaultValue(10)->end()
            ->end();

        return $treeBuilder;
    }
}
