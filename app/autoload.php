<?php
/**
 * autoload.php.
 *
 * @author    Valentin - Chaplean <valentin@chaplean.coop>
 * @copyright 2014 - 2015 Chaplean (http://www.chaplean.coop)
 * @since     2.0.0
 */

$loader = require __DIR__  . '/../vendor/autoload.php';

//if (class_exists('\Doctrine\Common\Annotations\AnnotationRegistry')) {
    \Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
//}

return $loader;
