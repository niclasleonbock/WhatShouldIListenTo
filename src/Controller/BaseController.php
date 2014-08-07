<?php
namespace WhatShouldIListenTo\Controller;

class BaseController
{
    protected $app;

    public function __construct()
    {
        $this->app = app();
    }

    public function __call($method, $params)
    {
        return call_user_func_array([ $this->app, $method ], $params);
    }

    public function __get($key)
    {
        return $this->app->{$key};
    }
}

