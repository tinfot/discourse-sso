<?php

namespace App\Extension\Tinfot\Discourse\Contracts;

/**
 * Interface Sso
 * @package Tinfot\Discourse\Contracts
 */
interface Sso {

    /**
     * Sso constructor.
     *
     * @param string $nonce
     * @param string $secret
     */
    public function __construct($nonce, $secret);

    /**
     * Build Sso body
     *
     * @param $payload
     *
     * @return mixed
     */
    public function build($payload);


}