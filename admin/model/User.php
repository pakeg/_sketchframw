<?php

namespace admin\model;

use engine\core\database\ActiveRecords;

class User
{
    use ActiveRecords;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var User id
     */
    public $id;

    /**
     * @var User name
     */
    public $name;

    /**
     * @var User email
     */
    public $email;

    /**
     * @var User password
     */
    public $password;

    /**
     * @var User role
     */
    public $role;

    /**
     * @var User hash
     */
    public $hash;

    /**
     * @var User date_reg
     */
    public $date_reg;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $id
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param User $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param User $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param User $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param User $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @return mixed
     */
    public function getDateReg()
    {
        return $this->date_reg;
    }

    /**
     * @param mixed $date_reg
     */
    public function setDateReg($date_reg)
    {
        $this->date_reg = $date_reg;
    }
}