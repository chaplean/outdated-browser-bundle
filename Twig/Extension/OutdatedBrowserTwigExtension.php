<?php

namespace Chaplean\Bundle\OutdatedBrowserBundle\Twig\Extension;

/**
 * OutdatedBrowserExtension.php.
 *
 * @author    Valentin - Chaplean <valentin@chaplean.com>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.com)
 * @since     1.0.0
 */
class OutdatedBrowserTwigExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var array
     */
    private $parametersOutdatedBrowser;

    /**
     * @var \Twig_Environment
     */
    private $templating;

    /**
     * OutdatedBrowserTwigExtension constructor.
     *
     * @param array             $parametersOutdatedBrowser
     * @param \Twig_Environment $templating
     */
    public function __construct(array $parametersOutdatedBrowser, \Twig_Environment $templating)
    {
        $this->parametersOutdatedBrowser = $parametersOutdatedBrowser;
        $this->templating = $templating;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('chaplean_outdatedbrowser', array($this, 'chapleanOutdatedbrowser'), array('is_safe' => array('html'))),
        );
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array(
            'chaplean_outdatedbrowser_background_color' => $this->parametersOutdatedBrowser['background_color'],
            'chaplean_outdatedbrowser_color'            => $this->parametersOutdatedBrowser['color'],
            'chaplean_outdatedbrowser_lower_than'       => $this->parametersOutdatedBrowser['lower_than'],
            'chaplean_outdatedbrowser_template'         => $this->parametersOutdatedBrowser['template'],
        );
    }

    public function chapleanOutdatedbrowser()
    {
        return $this->templating->render('ChapleanOutdatedBrowserBundle::chaplean-outdatedbrowser.html.twig');
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'chaplean_outdated_browser_twigextension';
    }
}