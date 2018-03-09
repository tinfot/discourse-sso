<?php

namespace App\Extension\Tinfot\Discourse;

use App\Extension\Tinfot\Discourse\Contracts\Sso as SsoContract;

/**
 * Class Sso
 *
 * @package Tinfot\Discourse
 */
class Sso implements SsoContract {

    private $nonce;
    private $secret;
    private $parameters = [];

    public function __construct($nonce, $secret) {
        $this->nonce  = $nonce;
        $this->secret = $secret;
    }

    public function setParameters(User $model) {
        $this->parameters = [
            'nonce'       => $this->nonce,
            'external_id' => $model->getId(),
            'email'       => $model->getEmail(),
            'name'        => $model->getName(),
        ];
    }

    /**
     * Build parameters
     *
     * @param Payload $model
     *
     * @return string
     */
    public function build($model) {
        $string = base64_encode(http_build_query($this->parameters));
        $data   = [
            'sso' => $string,
            'sig' => $model->encode($string)
        ];
        return http_build_query($data);
    }
}