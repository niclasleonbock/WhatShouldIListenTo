<?php
namespace WhatShouldIListenTo\Controller;

use WhatShouldIListenTo\Controller\BaseController;

class MainController extends BaseController
{
    public function indexAction()
    {
        return $this->redirect($this->urlFor('today'));
    }

    public function aboutAction()
    {
        return $this->render('about.php');
    }

    public function statisticsAction()
    {
        $total = 0;
        $days  = [];

        foreach (weekdays() as $day) {
            $days[$day] = $this->daymanager
                ->setDay($day)
                ->getSongs();

            $total += $days[$day]['count'] = count($days[$day]);
        }

        usort($days, function ($a, $b) {
            return $a['count'] < $b['count'];
        });

        return $this->render('statistics.php', [
            'total' => $total,
            'days'  => $days,
        ]);
    }
}

