<?php

namespace Tinfot\Discourse;

/**
 * Class Exception
 *
 * @package Tinfot\Discourse
 */
class Exception extends \Exception {
    /**
     * Class constructor
     *
     * @param string $message Error message
     * @param int $code Error code
     */
    public function __construct($message = null, $code = 0) {
        parent::__construct($message, $code);
    }
}