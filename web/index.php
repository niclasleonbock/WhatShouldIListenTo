<?php
include __DIR__ . '/../vendor/autoload.php';

include __DIR__ . '/../src/helpers.php';

$app = new WhatShouldIListenTo\Application([
    'debug' => false,
]); // hip namespace is hip

$app->error(function (Exception $exception) use ($app) {
    $app->render('error.php');
});

$app->post('/github-update', function () use ($app) {
    if ($app->request->headers['X-Hub-Signature'] != trim(file_get_contents('.webhook_secret')) {
        return $app->halt(403, 'You shall not pass!');
    }

    try {
        $payload = json_decode($_REQUEST['payload']);
    } catch(Exception $e) {
        return $app->halt(500);
    }

    if ('refs/heads/master' == $payload->ref) {
        file_put_contents(__DIR__ . '/../github.log', print_r($payload, true), FILE_APPEND);

        shell_exec('cd ' . realpath(__DIR__ . '/../app/days') . ' && git pull');
    }
});

$app->get('/about', function () use ($app) {
    return $app->render('about.php');
})->name('about');

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

$app->get('/songs/for/:day', function ($day) use ($app) {
    $manager = $app->daymanager;

    if ('today' == $day) {
        $day = new DateTime();
         $day_header = 'today';
    }

    $songs = $manager
        ->setDay($day)
        ->getSongs();

    return $app->render('day.php', [
        'songs'         => $songs,
        'day_header'    => isset($day_header) ? $day_header : 'on ' . $manager->getDay(),
    ]);
})->name('day');

$app->run();

