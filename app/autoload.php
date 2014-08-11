<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
// added to register custom Vendor (might not be the best way?)
$loader->add('Rebrec\Lib', realpath(DIR.'/../vendor/rebrec/src'));

return $loader;
