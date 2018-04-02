<?php
namespace WhatShouldIListenTo\Controller;

use Exception;
use WhatShouldIListenTo\Controller\BaseController;

class GithubController extends BaseController
{
    public function updateAction()
    {
        if (!$this->validateRequest()) {
            return $this->halt(403, 'You shall not pass!');
        }

        try {
            $payload = json_decode($this->request->getBody());
        } catch (Exception $exception) {
            $this->halt(500, print_r($exception, true));
        }

        if ('refs/heads/master' == $payload->ref) {
            $this->logPayload($payload);

            shell_exec('cd ' . realpath(__APP__ . '/days') . ' && git pull');

            return 'Days updated successfully!';
        }
    }

    protected function validateRequest()
    {
        $secret = trim(file_get_contents(__BASE__ . '/.webhook_secret'));
        $digest = hash_hmac('sha1', $this->request->getBody(), $secret);

        return $this->request->headers['X-Hub-Signature'] == 'sha1=' . $digest;
    }

    // I would love to use Slim's log writer,
    // but it won't let me write to different files
    // without big effort.
    protected function logPayload($payload)
    {
        $payload = print_r($payload, true);

        return file_put_contents(__APP__ . '/github.log', $payload, FILE_APPEND);
    }
}
