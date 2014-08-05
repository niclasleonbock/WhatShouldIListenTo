<?php
namespace WhatShouldIListenTo;

use Slim\Slim;
use WhatShouldIListenTo\DayManager;

class Application extends Slim
{
    public function __construct(array $userSettings = [])
    {
        parent::__construct($userSettings);

        $this->setName('What should I listen to?');

        $this->container->singleton('daymanager', function ($container) {
            return new DayManager(__DIR__ . '/../app/days');
        });

        $this->config([
            'templates.path' => __DIR__ . '/../app/templates',
        ]);

        $this->view()->appendData([
            'asset_path'    => $this->getBaseUrl(),
            'app'           => $this,
        ]);
    }

    public function getBaseUrl()
    {
        return rtrim($this->request()->getUrl(), '/') . '/';
    }
}

