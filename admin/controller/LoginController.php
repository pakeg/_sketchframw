<?php

namespace admin\controller;

use engine\core\controller\Controller;

class LoginController extends Controller
{
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function index()
    {    
        if ($this->auth->isAuth() === '1'):
            header('location: /admin/');
            exit;
        endif;

        $this->view->render('login');
    }

    public function signin()
    {        
        $post = $this->request->post;

        $query = $this->builder;        
        $sql = $query->select()
                ->from('users')
                ->where('email', $post['email'])
                ->where('password', $this->auth->bcrypt($post['password']))
                ->sql();

        $admin = $this->db->row($sql, $query->values);

        if (!empty($admin) && $admin['role'] === 'admin'):
            $this->auth->login($admin['email']);
            header('location: /admin/');
            exit;
        else:
            $this->isLogined();
        endif;
    }
}