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
}

