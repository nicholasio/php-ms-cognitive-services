<?php
namespace PHP_MSCS;

/**
 * Client class for PHP_MSCS, extends Client class of Guzzle
 *
 * @package PHP_MSCS
 */
class Client extends \GuzzleHttp\Client
{

    /**
     * Holds the mscs required headers
     * @var array
     */
    protected $mscs_headers = [
        'Content-Type' => 'application/json',
    ];

    /**
     * Holds mcscs subscription keys
     * @var array
     */
    protected $subscription_keys;

    public function __construct(array $config = [])
    {
        if ( ! isset($config['base_uri'])) {
            $config['base_uri'] = 'http://westus.api.cognitive.microsoft.com';
        }

        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function getSubscriptionKeys()
    {
        return $this->subscription_keys;
    }

    /**
     * @param array $subscription_keys
     */
    public function setSubscriptionKeys($subscription_keys)
    {
        $this->subscription_keys = $subscription_keys;
    }

    /**
     * @param string $subscription_key
     * @return array
     */
    public function getMscsHeaders($subscription_key = '')
    {
        $headers = $this->mscs_headers;
        $subscription_keys = $this->getSubscriptionKeys();

        if (isset($subscription_keys[$subscription_key])) {
            $headers['Ocp-Apim-Subscription-Key']
                = $subscription_keys[$subscription_key];
        }

        return $headers;
    }

    /**
     * @param array $mscs_headers
     */
    public function setMscsHeaders($mscs_headers)
    {
        $this->mscs_headers = $mscs_headers;
    }


}