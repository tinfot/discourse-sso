<?php

namespace Tinfot\Discourse;

use Tinfot\Discourse\Contracts\Sso as SsoContract;

/**
 * Class Sso
 *
 * @package Tinfot\Discourse
 */
class Sso implements SsoContract {

    private $nonce;
    private $secret;
    private $parameters = [];

    /**
     * Sso constructor.
     *
     * @param string $nonce
     * @param string $secret
     */
    public function __construct($nonce, $secret) {
        $this->nonce  = $nonce;
        $this->secret = $secret;
    }

    /**
     * Set sso parameters
     *
     * @param User $model
     */
    public function setParameters(User $model) {
        $this->parameters = [
            'nonce'       => $this->nonce,
            'external_id' => $model->id,
            'email'       => $model->email,
            'name'        => $model->name,
            'avatar_url'  => $model->avatar_url,
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