<?php
/**
 * This is the entry point for the application.
 */

require_once __DIR__ . '/vendor/autoload.php';
use app\core\Application;

$app = new Application();

$app->router->get('/', function() {
    return 'Hello World!';
});

$app->router->get('/contact', function() {
    return 'Contact page';
});

$app->run();