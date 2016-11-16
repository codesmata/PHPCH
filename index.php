<?php

require_once "autostart.php";
require_once "_sessions.php";

use Slim\Slim as Slim;
use AddressBook\RequestHandler\AddressBookHandler as BookHandler;


/*
|--------------------------------------------------------------------------
| INSTANTIATIONS
|--------------------------------------------------------------------------
*/

$app = new Slim(array(
    'debug' => true,
    'templates.path' => 'view',
    'mode' => 'development'));

/*
|--------------------------------------------------------------------------
| APPLICATION MODES CONFIGURATION
|--------------------------------------------------------------------------
*/

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

/*
|--------------------------------------------------------------------------
|                               W - E - B
|--------------------------------------------------------------------------
|
|           WEB Routes and Handlers Request Handlers
|
| ------------------------------------------------------------------------*/

$addressBookHandler = new BookHandler($app);

$app->get('/', function() use ($app) {
    $app->render("home.php");
});

$app->get('/add', function() use ($app) {
    $app->render("new_contact.php");
});

$app->get('/list', function() use ($app, $addressBookHandler) {
    $addressBookHandler->listContacts();
});

$app->post('/add', function() use ($app, $addressBookHandler) {
    $addressBookHandler->createContact();
});

$app->run();
