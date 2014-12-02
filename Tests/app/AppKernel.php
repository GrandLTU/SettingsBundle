<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Class AppKernel.
 */
class AppKernel extends Kernel
{
    /**
     *  {@inheritdoc}
     *
     * @return array|\Symfony\Component\HttpKernel\Bundle\BundleInterface[]
     */
    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),

            new ONGR\ElasticsearchBundle\ONGRElasticsearchBundle(),
            new Tedivm\StashBundle\TedivmStashBundle(),

            new ONGR\RouterBundle\ONGRRouterBundle(),
            //new ONGR\FilterManagerBundle\ONGRFilterManagerBundle(),
            //new ONGR\ContentBundle\ONGRContentBundle(),

            new ONGR\CookiesBundle\ONGRCookiesBundle(),
            new ONGR\AdminBundle\ONGRAdminBundle(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param LoaderInterface $loader
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
