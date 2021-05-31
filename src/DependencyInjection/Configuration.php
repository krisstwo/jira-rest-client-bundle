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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Mohamed KRISTOU <krisstwo@gmail.com>
 */
class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jira_rest_client');
        $rootNode
            ->children()
                ->scalarNode('host')->end()
                ->scalarNode('username')->end()
                ->scalarNode('token')->end()
                ->booleanNode('cookie_auth_enabled')->defaultFalse()->end()
                ->scalarNode('cookie_file')->defaultNull()->end()
                ->scalarNode('proxy_host')->defaultNull()->end()
                ->scalarNode('proxy_port')->defaultNull()->end()
                ->scalarNode('proxy_username')->defaultNull()->end()
                ->scalarNode('proxy_password')->defaultNull()->end()
                ->booleanNode('use_api_v3')->defaultFalse()->end()
        ;

        return $treeBuilder;
    }
}