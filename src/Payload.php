<?php

namespace Tinfot\Discourse;

use Tinfot\Discourse\Contracts\Payload as PayloadContract;
use Tinfot\Discourse\Exceptions\PayloadException;

class Payload implements PayloadContract {

    private $algo;
    private $secret;

    public function __construct($secret, $algo = 'sha256') {
        $this->secret  = $secret;
        $this->algo    = $algo;
    }

    public function encode($value) {
        return hash_hmac($this->algo, $value, $this->secret);
    }

    public function decode($payload) {
        $payload = urldecode($payload);
        $query   = [];
        parse_str(base64_decode($payload), $query);
        if (!array_key_exists('nonce', $query)) {
            throw new PayloadException('Not found nonce in payload');
        }
        return $query['nonce'];
    }

    public function validate($payload, $signature) {
        $payload = urldecode($payload);
        return $this->encode($payload) === $signature;
    }
}