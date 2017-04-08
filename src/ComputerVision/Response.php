<?php
namespace PHP_MSCS\ComputerVision;

class Response
{
    /**
     * Response constructor.
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
		var_dump($response);
    }
}
