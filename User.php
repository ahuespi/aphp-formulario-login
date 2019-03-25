<?php

use phpDocumentor\Reflection\Types\Boolean;

class User 
{
    protected $email;
    protected $password;
    protected $remember = false;

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function remember()
    {
        $this->remember = true;
        return $this;       
    }
    public function isRemembered()
    {
        return $this->remember;
    }

    public function getValidationRule()
    {
        return [
            'email' => ['isNotEmptyRule', 'isEmailRule'],
            'password' => ['isSecuredPassword'],
        ];
    }
}
