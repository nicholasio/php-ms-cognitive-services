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
     * @param string $body
     * @param string $query_data
     *
     * @param bool $http_method
     *
     * @return Response
     */
    public function sendRequest($api_method, $body = '', $query_data = '', $http_method = false)
    {
        if (false === $http_method) {
            $http_method = $this->method;
        }

        try {
            return new Response(
                $this->client->request(
                    $http_method,
                    $this->endpoint . $api_method,
                    [
                        'headers' => $this->client->getMscsHeaders($this->subscription_key_name),
                        'query'   => $query_data,
                        'body'    => $body
                    ]
                )
            );
        } catch (\Exception $e) {

        }
    }
}
