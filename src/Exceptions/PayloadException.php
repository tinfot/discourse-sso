<?php

namespace Tinfot\Discourse\Exceptions;

use Tinfot\Discourse\Exception;

/**
 *
 * Discourse Payload Exception
 *
 * @category   Discourse
 * @version    1.0.0
 * @package    tinfot/discourse-sso
 * @copyright  Copyright (c) 2017 - 2018 Richard Tian (http://www.richard.lol)
 * @author     Richard <richard_tianke@qq.com>
 * @license    https://mit-license.org/    MIT
 */
class PayloadException extends Exception {
    /**
     * Class constructor
     *
     * @param string $message Error message
     * @param int $code Error code
     */
    function __construct($message = null, $code = 0) {
        parent::__construct($message, $code);
    }
}