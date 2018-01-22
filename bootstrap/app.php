<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/handlers/exceptions.php';

$config = require_once __DIR__ . '/../app/src/config.php';


$app = new \Slim\App(['settings'=> $config]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$capsule->getContainer()->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Handlers\Exceptions\Handler::class
); 

require_once __DIR__ . '/../app/api.php';
