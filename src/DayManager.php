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

    public function getPath($day = null)
    {
        if ($day) {
            return $this->path . '/' . $day . '.json';
        }

        return $this->path;
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

    public function transformDay($day)
    {
        if (is_integer($day)) {
            $day = new DateTime('Sunday +' . $day . ' days');
        }

        if ($day instanceof DateTime) {
            $day = $day->format('l');
        }

        if (!is_string($day)) {
            throw new Exception('Weekday must be an instance of DateTime, a string or an integer between 1 and 7.');
        }

        return strtolower($day);
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

