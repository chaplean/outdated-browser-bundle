<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * Class AppKernel.
 *
 * @author    Valentin - Chaplean <valentin@chaplean.coop>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class AppKernel extends Kernel
{
    /**
     * @return array
     */
    public function registerBundles()
    {
        return array(
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Liip\FunctionalTestBundle\LiipFunctionalTestBundle(),
            new Chaplean\Bundle\OutdatedBrowserBundle\ChapleanOutdatedBrowserBundle(),
            new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
            new Symfony\Bundle\DebugBundle\DebugBundle(),
        );
    }

    /**
     * @param LoaderInterface $loader
     *
     * @return void
     * @throws \Exception
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(
            function (ContainerBuilder $container) {
                $container->setParameter('container.autowiring.strict_mode', true);
                $container->setParameter('container.dumper.inline_class_loader', true);
                $container->addObjectResource($this);
            }
        );

        $loader->load(__DIR__ . '/config/config_' . $this->getEnvironment() .'.yml');
    }

    /**
     * @return string
     */
    public function getCacheDir()
    {
        $cacheDir = sys_get_temp_dir() . '/cache/' . $this->getEnvironment();
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }

        return $cacheDir;
    }

    /**
     * @return string
     */
    public function getLogDir()
    {
        $logDir = sys_get_temp_dir() . '/logs/' . $this->getEnvironment();
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        return $logDir;
    }
}
