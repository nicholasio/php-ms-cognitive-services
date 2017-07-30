<?php

namespace PHP_MSCS\Language;

use PHP_MSCS\BasicRequest;
use PHP_MSCS\Response;

class BingSpellCheck extends BasicRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';

    /**
     * @var string
     */
    protected $endpoint = 'https://api.cognitive.microsoft.com/bing/v5.0/';

    /**
     * @param $text
     *
     * @return string
     */
    protected function buildBody($text)
    {
        return sprintf('text=%s', rawurlencode($text));
    }

    /**
     * @param        $text
     * @param string $mode
     * @param string $mkt
     *
     * @return Response
     */
    public function check($text, $mode = 'proof', $mkt = 'en-us')
    {
        $query_data = [
            'mode' => $mode,
            'mkt'  => $mkt,
        ];

        return $this->sendRequest(
            'spellcheck',
            $this->buildBody($text),
            $query_data
        )->decode();
    }
}
