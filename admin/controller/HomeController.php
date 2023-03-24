<?php

namespace admin\controller;

use engine\core\controller\Controller;

class HomeController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
        $this->isLogined();
    }

    public function index()
    {   
        $this->view->render('main', $data);
    }

    public function logout()
    {   
        $this->auth->logout();
        echo 'выйти';
        exit;
    }
}