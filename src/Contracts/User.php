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
     */
    public function __construct($id, $email, $name = null, $username = null);

}