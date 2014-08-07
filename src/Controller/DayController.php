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
            'day_header'    => 'on ' . $manager->getDay(),
        ]);
    }

    public function todayAction()
    {
        $song = $this->daymanager
            ->setDay(new DateTime())
            ->getRandomSong();

        return $this->render('song.php', [
            'song'          => $song,
            'day_header'    => 'today',
        ]);
    }
}

