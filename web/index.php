<?php
$app = include __DIR__ . '/../src/boot.php';

$app->get('/', controller('MainController:indexAction'))->name('home');
$app->get('/about', controller('MainController:aboutAction'))->name('about');
$app->get('/statistics', controller('MainController:statisticsAction'))->name('statistics');

$app->get('/today', controller('DayController:todayAction'))->name('today');
$app->get('/on/:day', controller('DayController:onAction'))->name('on');

$app->get('/songs/for/:day', controller('SongController:forAction'))->name('day');

$app->post('/github-update', controller('GithubController:updateAction'));

$app->run();

