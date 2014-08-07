<?php
namespace WhatShouldIListenTo\Controller;

use DateTime;
use WhatShouldIListenTo\Controller\BaseController;

class SongController extends BaseController
{
    public function forAction($day)
    {
        $manager = $this->daymanager;

        if ('today' == $day) {
            $day = new DateTime();
            $day_header = 'today';
        }

        $songs = $manager
            ->setDay($day)
            ->getSongs();

        return $this->render('day.php', [
            'songs'         => $songs,
            'day_header'    => isset($day_header) ? $day_header : 'on ' . $manager->getDay(),
        ]);
    }
}

