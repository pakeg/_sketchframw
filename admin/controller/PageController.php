<?php

namespace admin\controller;

use engine\core\controller\Controller;

class PageController extends Controller
{
    public function index()
    {
        $pages = [];

        $query = $this->builder;
        $sql = $query->select()
                ->from('pages')
                ->orderBy('date', 'DESC')
                ->sql();

        $pages = $this->db->row($sql, $query->values);

        $this->view->render('pages/list', $pages);
    }

    public function create()
    {
        $this->view->render('pages/create');
    }
}