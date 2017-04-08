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

    const VS_DESCRIPTION = 'Description';

    const VS_TAGS = 'Tags';

    const VS_FACES = 'Faces';

    const VS_IMAGE_TYPE = 'ImageType';

    const VS_COLOR = 'Color';

    const VS_ADULT = 'Adult';

    /**
     * Generates the body of the request
     *
     * @param $image
     *
     * @return string
     */
    protected function buildBody($image)
    {
        $body = \GuzzleHttp\json_encode([
            'url'   => $image
        ]);

        return $body;
    }

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

        return $this->sendRequest('analyze', $this->buildBody($image), $query_data);
    }

    /**
     * @param $image
     * @param int $maxCandidates
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function describe($image, $maxCandidates = 1)
    {
        $query_data = [
            'maxCandidates'  => $maxCandidates,
        ];


        return $this->sendRequest('describe', $this->buildBody($image), $query_data);
    }

    /**
     * @param $image
     * @param $width
     * @param $height
     * @param bool $smartCropping
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function thumbnail($image, $width, $height, $smartCropping = false)
    {
        $query_data = [
            'width'     => $width,
            'height'    => $height,
            'smartCropping' => $smartCropping,
        ];

        return $this->sendRequest('generateThumbnail', $this->buildBody($image), $query_data);
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function models()
    {
        return $this->sendRequest('models', '', '', 'GET');
    }

    /**
     * @param $image
     * @param $language
     * @param bool $detectOrientation
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function ocr($image, $language, $detectOrientation = false)
    {
        $query_data = [
            'language'          => $language,
            'detectOrientation' => $detectOrientation,
        ];

        return $this->sendRequest('ocr', $this->buildBody($image), $query_data);
    }

    /**
     * @param $image
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function tagImage($image)
    {
        return $this->sendRequest('tag', $this->buildBody($image));
    }

    /**
     * @param $image
     * @param $model
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function modelAnalysis($image, $model)
    {
        return $this->sendRequest(sprintf('models/%s/analyze', $model), $this->buildBody($image));
    }
}