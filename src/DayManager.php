<?php
namespace WhatShouldIListenTo;

use DateTime;
use Exception;

class DayManager
{
    protected $path;
    protected $day;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function getPath()
    {
        return $this->path . '/' . $this->day . '.json';
    }

    public function setDay($day)
    {
        $this->day = $this->transformDay($day);

        if (!$this->isValidDay()) {
            throw new Exception('Unknown day ' . $this->day . ', no meta file found.');
        }

        return $this;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function isValidDay()
    {
        return file_exists($this->getPath($this->day));
    }

    protected function transformDay($day)
    {
        if ('today' == $day) {
            $day = new DateTime();
        }

        if ('tomorrow' == $day) {
            $day = (new DateTime())->modify('+1 day');
        }

        if (is_string($day)) {
            $day = new DateTime($day);
        }

        if (!$day instanceof DateTime) {
            throw new Exception('Cannot transformat day, most probably because of an invalid format.');
        }

        return strtolower($day->format('l'));
    }

    public function getSongs()
    {
        $file = $this->getPath($this->day);

        return json_decode(file_get_contents($file));
    }

    public function getRandomSong()
    {
        $songs = $this->getSongs();
        $key   = array_rand($songs);

        return $songs[$key];
    }
}
