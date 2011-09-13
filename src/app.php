<?php

$app->get('/', function() use ($app) {
	
  return $app['twig']->render('homepage.html.twig');

});

$app->get('/help', function() use ($app) {
  
  return $app['twig']->render('help.html.twig');
  
});

$app->get('/api/{type}/{ip}/{port}', function($type, $ip, $port = 8000 use ($app) {
  
  return $app['twig']->render('pages/'.$page.'.html.twig');
  
});
