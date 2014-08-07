<?php

function weekdays($day = null)
{
    return [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];
}

function app()
{
    return Slim\Slim::getInstance();
}

function controller($controller)
{
    return '\\WhatShouldIListenTo\\Controller\\' . $controller;
}

function lastFm($artist, $song = null)
{
    $url = 'http://www.lastfm.com/music/' . urlencode($artist);

    if ($song) {
        $url .= '/_/' . urlencode($song);
    }

    return $url;
}

