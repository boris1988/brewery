<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\RequestInterface;

use Magento\Framework\HTTP\Client\Curl;

class Request implements RequestInterface
{

    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $curl;


    public function __construct(
        Curl $curl
    ) {
        $this->curl = $curl;
    }

    public function send(string $url, $params = [])
    {
        return $this->curl->get($url)
    }
}