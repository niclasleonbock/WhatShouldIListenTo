<?php
define('__BASE__', __DIR__ . '/..');
define('__APP__', __BASE__ . '/app');
define('__VENDOR__', __BASE__ . '/vendor');

include __VENDOR__ . '/autoload.php';

include __DIR__ . '/helpers.php';

$app = new WhatShouldIListenTo\Application([ // hip namespace is hip
    'debug' => false,
]);

$app->error(function (Exception $exception) use ($app) {
    $app->render('error.php');
});

return $app;

