<?php

class Utilisateur {
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    private $password;

    public function __construct($sent_id=0, $sent_firstname="toto", $sent_lastname="titi", $sent_email="toto@fake.com", $sent_password="123456") {
        $this->id=$sent_id;
        $this->firstname=$sent_firstname;
        $this->lastname=$sent_lastname;
        $this->email=$sent_email;
        $this->password=$sent_password;        
    }

    // getter
    public function getPassword() {
        return $this->password;
    }

    // setter
    public function setPassword($password){
        $this->password = $password;
    }

}