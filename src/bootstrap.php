<?php

require_once __DIR__.'/../vendor/silex.phar';

use Silex\Application;
use Silex\Extension\TwigExtension;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();

$app['autoloader']->registerNamespace('Symfony', __DIR__.'/../vendor/symfony/src');

if($_SERVER['REMOTE_ADDR'] === '62.248.41.112')
	$app['debug'] = TRUE;

// Register Silex Extensions
$app->register(new TwigExtension(), array(
  'twig.path'       => __DIR__.'/../views',
  'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
  'twig.options'    => array(
    'debug' => true,
    'cache' => __DIR__.'/../cache',
  ),
));

return $app;