<?php
include __DIR__ . '/../vendor/autoload.php';

include __DIR__ . '/../src/helpers.php';

$app = new WhatShouldIListenTo\Application([
    'debug' => false,
]); // hip namespace is hip

$app->error(function (Exception $exception) use ($app) {
    $app->render('error.php');
});

$app->get('/', function () use ($app) {
    return $app->redirect($app->urlFor('today'));
})->name('home');

$app->get('/today', function () use ($app) {
    $manager = $app->daymanager;

    $song = $manager
        ->setDay(new DateTime())
        ->getRandomSong();

    return $app->render('song.php', [
        'song'          => $song,
        'day_header'    => 'today',
    ]);
})->name('today');

$app->get('/on/:day', function ($day) use ($app) {
    $manager = $app->daymanager;

    $song = $manager
        ->setDay($day)
        ->getRandomSong();

    return $app->render('song.php', [
        'song'          => $song,
        'day_header'    => 'on ' . $manager->getDay(),
    ]);
})->name('on');



$app->run();

