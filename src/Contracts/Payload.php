<?php

namespace Tinfot\Discourse\Contracts;

/**
 * Interface Payload
 * @package Tinfot\Discourse\Contract
 */
interface Payload {

    /**
     * Payload constructor.
     *
     * @param string $secret
     * @param null $algo
     */
    public function __construct($secret, $algo = null);

    /**
     * Encode string to payload
     *
     * @param string $value
     *
     * @return mixed
     */
    public function encode($value);

    /**
     * Decode payload to nonce
     *
     * @param string $payload
     *
     * @return mixed
     */
    public function decode($payload);

    /**
     * Validate payload match signature
     *
     * @param string $payload
     * @param string $signature
     *
     * @return mixed
     */
    public function validate($payload, $signature);
}