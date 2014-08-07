<?php
namespace WhatShouldIListenTo\Controller;

use Exception;
use WhatShouldIListenTo\Controller\BaseController;

class GithubController extends BaseController
{
    public function updateAction()
    {
        $secret = trim(file_get_contents(__DIR__ . '/../.webhook_secret'));
        $digest = hash_hmac('sha1', $this->request->getBody(), $secret);
        $body   = $this->request->getBody();

        if ($this->request->headers['X-Hub-Signature'] != 'sha1=' . $digest) {
            return $this->halt(403, 'You shall not pass!');
        }

        try {
            $payload = json_decode($body);
        } catch(Exception $exception) {
            $this->halt(500, print_r($exception, true));
        }

        if ('refs/heads/master' == $payload->ref) {
            file_put_contents(__APP__ . '/github.log', print_r($payload, true), FILE_APPEND);

            shell_exec('cd ' . realpath(__DIR__ . '/../app/days') . ' && git pull');

            return 'Days updated successfully!';
        }
    }
}

