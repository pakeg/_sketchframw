<?php

#engine routes
$this->router->add('home', '/', 'HomeController:index');

# admin routes
    #dashboard
    $this->router->add('admin', '/admin/', 'HomeController:index');
    #login to admin dashboard view
    $this->router->add('admin.login', '/admin/login', 'LoginController:index');
    #login to admin dashboard post method
    $this->router->add('admin.signin', '/admin/signin', 'LoginController:signin', 'POST');
    #logout from admin dashboard method
    $this->router->add('admin.logout', '/admin/logout', 'HomeController:logout');
    #page list
    $this->router->add('admin.page', '/admin/pages', 'PageController:index');
    #page create
    $this->router->add('admin.page.create', '/admin/pages/create', 'PageController:create');