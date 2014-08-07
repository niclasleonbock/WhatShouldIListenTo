<?php
define('__APP__', __DIR__ . '/../app');
define('__VENDOR__', __DIR__ . '/../vendor');

include __VENDOR__ . '/autoload.php';

include __DIR__ . '/helpers.php';

$app = new WhatShouldIListenTo\Application([ // hip namespace is hip
    'debug' => false,
]);

$app->error(function (Exception $exception) use ($app) {
    $app->render('error.php');
});

return $app;

