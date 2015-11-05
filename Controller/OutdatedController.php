<?php

namespace Chaplean\Bundle\OutdatedBrowserBundle\Controller;

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
     * @return Response
     */
    public function outdatedAction()
    {
        $script = $this->renderView('ChapleanOutdatedBrowserBundle::outdated.js.twig', array(
            'template'   => $this->renderView($this->getParameter('chaplean_outdated_browser.template')),
            'backgroundColor' => $this->getParameter('chaplean_outdated_browser.background_color'),
            'color' => $this->getParameter('chaplean_outdated_browser.color'),
            'lowerThan' => $this->getParameter('chaplean_outdated_browser.lower_than'),
        ));

        $response = new Response($script);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    }
}