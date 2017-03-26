<?php
namespace PHP_MSCS\ComputerVision;

use GuzzleHttp\Psr7\Uri;
use PHP_MSCS\BasicRequest;

/**
 * Class ComputerVision
 *
 * @package PHP_MSCS\ComputerVision
 */
class ComputerVision extends BasicRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @var string
     */
    protected $endpoint = 'vision/v1.0/';

    /**
     * @var string
     */
    protected $subscription_key_name = ComputerVision::class;

    /**
     * @param $image
     * @param array $visualFeatures
     * @param array $detail
     * @param string $language
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function analyze($image, array $visualFeatures = [], array $detail = [], $language = 'en')
    {
        $query_data = [
            'visualFeatures' => implode(',', $visualFeatures),
            'default'        => implode(',', $detail),
            'language'       => $language
        ];

        $body = \GuzzleHttp\json_encode([
            'url'   => $image
        ]);

        return new Response($this->sendRequest('analyze', $body, $query_data));
    }

    public function describe()
    {

    }

    public function thumbnail()
    {

    }

    public function ocr()
    {

    }

    public function tagImage()
    {

    }

    public function getDomainSpecificModels()
    {

    }


}