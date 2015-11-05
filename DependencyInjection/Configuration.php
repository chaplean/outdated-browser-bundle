<?php

namespace Chaplean\Bundle\OutdatedBrowserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chaplean_outdated_browser');

        $rootNode
            ->children()
                ->scalarNode('background_color')->defaultValue('#f25648')->end()
                ->scalarNode('color')->defaultValue('#ffffff')->end()
                ->scalarNode('lower_than')->defaultValue('transform')->end()
                ->scalarNode('template')->defaultValue('ChapleanOutdatedBrowserBundle:Template:outdated.html.twig')->end()
            ->end();


        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
