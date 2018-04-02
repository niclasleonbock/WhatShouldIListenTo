<?php
// phpcs:disable PSR1.Files.SideEffects
// here we explicitly WANT to do both: define constants and include all the necessary files

define('__BASE__', __DIR__ . '/..');
define('__APP__', __BASE__ . '/app');
define('__VENDOR__', __BASE__ . '/vendor');

include __VENDOR__ . '/autoload.php';

include __DIR__ . '/helpers.php';

// phpcs:enable

$app = new WhatShouldIListenTo\Application([ // hip namespace is hip
    'debug' => false,
]);

$app->error(function (Exception $exception) use ($app) {
    $app->render('error.php');
});

$app->notFound(function () use ($app) {
    $app->render('error.php');
});

return $app;
