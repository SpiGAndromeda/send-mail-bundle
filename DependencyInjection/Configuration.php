<?php
/**
 * Created by PhpStorm.
 * User: marti
 * Date: 30.08.2017
 * Time: 15:29
 */

namespace SpiGAndromeda\SendMailBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
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
                    ->cannotBeEmpty()
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