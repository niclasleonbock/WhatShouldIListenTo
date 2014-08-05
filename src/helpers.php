<?php

function lastFm($artist, $song = null)
{
    $url = 'http://www.lastfm.com/music/' . urlencode($artist);

    if ($song) {
        $url .= '/_/' . urlencode($song);
    }

    return $url;
}

