<?php

require_once '../includes/silex.phar';
include 'includes/config.php';

$app = new Silex\Application();

// magic will happen here

$app->run();