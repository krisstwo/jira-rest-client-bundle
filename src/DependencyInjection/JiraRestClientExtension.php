<?php

/**
 * Coffee & Brackets software studio
 * 
 * (c) Mohamed KRISTOU <krisstwo@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Krisstwo\JiraRestClientBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * @author Mohamed KRISTOU <krisstwo@gmail.com>
 */
class JiraRestClientExtension extends Extension
{
    /**
     * Loads a specific configuration.
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);


        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config/')
        );
        $loader->load('services.yaml');

        $configurationServiceDefinition = $container->getDefinition('jira_rest_client.configuration');
        $arrayConfiguration = [
            'jiraHost' => $config['host'],
            'jiraUser' => $config['username'],
            'jiraPassword' => $config['token'],
            'cookieAuthEnabled' => $config['cookie_auth_enabled'],
            'cookieFile' => $config['cookie_file'],
            "proxyServer" => $config['proxy_host'],
            "proxyPort" => $config['proxy_port'],
            "proxyUser" => $config['proxy_username'],
            "proxyPassword" => $config['proxy_password'],
        ];
        $configurationServiceDefinition->addArgument($arrayConfiguration);
    }
}
