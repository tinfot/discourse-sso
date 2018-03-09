<?php

namespace Tinfot\Discourse;

use Tinfot\Discourse\Contracts\User as UserContract;

class User implements UserContract {

    private $id;
    private $email;
    private $name;
    private $username;

    public function __construct($id, $email, $name = null, $username = null) {
        $this->id       = $id;
        $this->email    = $email;
        $this->name     = $name;
        $this->username = $username;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }

    public function getUsername() {
        return $this->username;
    }
}