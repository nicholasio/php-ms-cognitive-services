<?php
namespace PHP_MSCS;

/**
 * Class BasicRequest
 *
 * @package PHP_MSCS
 */
class BasicRequest
{

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $subscription_key_name;

    /**
     * BasicRequest constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $api_method
     * @param string $query_data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function sendRequest($api_method, $body, $query_data = '')
    {
        return $this->client->request($this->method, $this->endpoint . $api_method, [
            'headers'   => $this->client->getMscsHeaders($this->subscription_key_name),
            'query'     => $query_data,
            'body'      => $body
        ]);
    }
}