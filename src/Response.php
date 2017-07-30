<?php

namespace PHP_MSCS;

class Response {
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $http_response;

    /**
     * @var bool
     */
    protected $decode = false;

    /**
     * Response constructor.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct( \GuzzleHttp\Psr7\Response $response ) {
        $this->http_response = $response;
    }

    /**
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getHttpResponseObject() {
        return $this->http_response;
    }

    /**
     * @return $this
     */
    public function decode() {
        $this->decode = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function encode() {
        $this->decode = false;

        return $this;
    }

    /**
     * @return string
     */
    public function getJson() {
        $contents = $this->http_response->getBody()->getContents();

        return $this->decode ? \GuzzleHttp\json_decode( $contents ) : $contents;
    }
}
