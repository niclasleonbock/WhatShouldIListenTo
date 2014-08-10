<?php
namespace WhatShouldIListenTo\Controller;

use DateTime;
use WhatShouldIListenTo\Controller\BaseController;

class DayController extends BaseController
{
    public function onAction($day)
    {
        $manager = $this->daymanager;

        $song = $manager
            ->setDay($day)
            ->getRandomSong();

        return $this->render('song.php', [
            'song'          => $song,
            'day'           => $day,
            'day_header'    => 'on ' . $day,
        ]);
    }

    public function todayAction()
    {
        $song = $this->daymanager
            ->setDay('today')
            ->getRandomSong();

        return $this->render('song.php', [
            'song'          => $song,
            'day'           => 'today',
        ]);
    }

    public function tomorrowAction()
    {
        $song = $this->daymanager
            ->setDay('tomorrow')
            ->getRandomSong();

        return $this->render('song.php', [
            'song'          => $song,
            'day'           => 'tomorrow',
        ]);
    }
}

