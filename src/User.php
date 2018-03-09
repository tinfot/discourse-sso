<?php

namespace Tinfot\Discourse;

use Tinfot\Discourse\Contracts\User as UserContract;

/**
 * Class User
 *
 * @package Tinfot\Discourse
 */
class User implements UserContract {

    public $id;
    public $email;
    public $name;
    public $username;
    public $avatar_url;

    /**
     * User constructor.
     *
     * @param int $id
     * @param string $email
     * @param null $name
     * @param null $username
     * @param null $avatar_url
     */
    public function __construct($id, $email, $name = null, $username = null, $avatar_url = null) {
        $this->id         = $id;
        $this->email      = $email;
        $this->name       = $name;
        $this->username   = $username;
        $this->avatar_url = $avatar_url;
    }

    /**
     * Set undefined property
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {
        $this->$name = $value;
    }

    /**
     * Get undefined property
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name) {
        return $this->$name;
    }
}