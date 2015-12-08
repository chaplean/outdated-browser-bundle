<?php

namespace Chaplean\Bundle\OutdatedBrowserBundle\Controller;

use GK;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * OutdatedController.php.
 *
 * @author    Valentin - Chaplean <valentin@chaplean.com>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.com)
 * @since     1.0.0
 */
class OutdatedController extends Controller
{
    /**
     * @param boolean $uglify
     *
     * @return Response
     * @throws \Exception
     */
    public function outdatedAction($uglify = false)
    {
        $script = $this->renderView('ChapleanOutdatedBrowserBundle::outdated.js.twig');

        if ($uglify) {
            $packer = new GK\JavascriptPacker($script);
            $script = $packer->pack();
        }

        $response = new Response($script);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    }
}
