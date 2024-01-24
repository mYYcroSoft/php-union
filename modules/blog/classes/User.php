<?php

class User
{
    protected $identifier;
    protected $username;
    protected $password;
    protected $email;
    protected $conn;

    public function __construct($id, $username, $password, $email, $conn)
    {
        $this->identifier = $identifier;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->conn = $conn;
    }
}
