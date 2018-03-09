<?php

namespace Tinfot\Discourse\Contracts;

/**
 * Interface Payload
 * @package Tinfot\Discourse\Contract
 */
interface User {

    /**
     * User constructor.
     *
     * @param integer $id
     * @param string $email
     * @param null $name
     * @param null $username
     * @param null $avatar_url
     */
    public function __construct($id, $email, $name = null, $username = null, $avatar_url = null);

}