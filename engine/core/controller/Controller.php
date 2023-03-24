<?php

namespace engine\core\controller;

use engine\di\Di;
use engine\core\auth\Auth;
use engine\core\helper\QueryBuilder;

abstract class Controller
{
    protected $db;
    protected $view;
    protected $auth;
    protected $request;
    protected $builder;
    protected $logined;

    public function __construct(Di $di)
    {        
        $this->db = $di->get('db');
        $this->view = $di->get('view');
        $this->request = $di->get('request');
        $this->auth = new Auth();
        $this->builder = new QueryBuilder();
    }
    
    protected function isLogined()
    {
        if (is_null($this->auth->isAuth())):
            header('location: /admin/login');
            exit;
        else:
            return true;
        endif;
    }
} 