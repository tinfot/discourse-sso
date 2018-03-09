<?php

namespace Tinfot\Discourse;

use Tinfot\Discourse\Contracts\Payload as PayloadContract;
use Tinfot\Discourse\Exceptions\PayloadException;

/**
 * Class Payload
 *
 * @package Tinfot\Discourse
 */
class Payload implements PayloadContract {

    private $algo;
    private $secret;

    /**
     * Payload constructor.
     *
     * @param string $secret
     * @param string $algo
     */
    public function __construct($secret, $algo = 'sha256') {
        $this->secret  = $secret;
        $this->algo    = $algo;
    }

    /**
     * Encode payload
     *
     * @param string $value
     *
     * @return string
     */
    public function encode($value) {
        return hash_hmac($this->algo, $value, $this->secret);
    }

    /**
     * Decode payload
     *
     * @param string $payload
     *
     * @return mixed
     * @throws PayloadException
     */
    public function decode($payload) {
        $payload = urldecode($payload);
        $query   = [];
        parse_str(base64_decode($payload), $query);
        if (!array_key_exists('nonce', $query)) {
            throw new PayloadException('Not found nonce in payload');
        }
        return $query['nonce'];
    }

    /**
     * Validate payload match signature
     *
     * @param string $payload
     * @param string $signature
     *
     * @return bool
     */
    public function validate($payload, $signature) {
        $payload = urldecode($payload);
        return $this->encode($payload) === $signature;
    }
}