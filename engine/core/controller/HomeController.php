<?php

namespace engine\core\controller;

use engine\core\controller\Controller;

class HomeController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function index()
    {
        $this->view->render('index', $data);
    }
}