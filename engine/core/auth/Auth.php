<?php

namespace engine\core\auth;

use engine\core\auth\AuthInterface;
use engine\core\helper\Cookie;

class Auth implements AuthInterface
{
    public function isAuth()
    {
        return Cookie::get('auth_authorized');
    }

    public function user()
    {
        return Cookie::get('auth_user');
    }

    public function login($user)
    {
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    public function logout()
    {
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    public static function bcrypt($password)
    {
        return hash('sha256', $password);
    }

    private function salt()
    {
        return (string) rand(1000000, 9999999);
    }   
    
}