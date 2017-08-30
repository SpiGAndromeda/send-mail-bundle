<?php
/**
 * Created by PhpStorm.
 * User: marti
 * Date: 30.08.2017
 * Time: 15:47
 */

namespace SpiGAndromeda\SendMailBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\Extension\Extension;

class SendMailExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__).'/Resources/config'));
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('acme.social.twitter_client');
        $def->replaceArgument(0, $config['host']);
        $def->replaceArgument(0, $config['port']);
        $def->replaceArgument(0, $config['encryption']);
        $def->replaceArgument(0, $config['sent_items_folder']);
        $def->replaceArgument(0, $config['login']);
        $def->replaceArgument(0, $config['password']);
    }
}