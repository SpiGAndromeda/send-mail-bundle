<?php

namespace SpiGAndromeda\SendMailBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package SpiGAndromeda\SendMailBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->root('send_mail');

        $rootNode
            ->children()
                ->scalarNode('host')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->defaultValue('localhost')
                ->end()
                ->integerNode('port')
                    ->isRequired()
                    ->defaultValue(993)
                ->end()
                ->enumNode('encryption')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->values(array('ssl', 'tls', 'notls'))
                ->end()
                ->scalarNode('sent_items_folder')
                    ->isRequired()
                    ->cannotBeEmpty()
                    ->defaultValue('Sent Items')
                ->end()
                ->scalarNode('login')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('password')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $treeBuilder;
    }
}