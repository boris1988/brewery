<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\RequestInterface;

use Magento\Framework\HTTP\Client\Curl;

/**
 * Class Request
 *
 * @package Borisperevyazko\Brewery\Model
 */
class Request implements RequestInterface
{

    /**
     * @var \Magento\Framework\HTTP\Client\Curl
     */
    protected $curl;

    /**
     * @var Config
     */
    protected $config;

    protected $baseUrl;

    protected $apiKey;
    
    protected $requestString = '';

    protected $response = [];

    /**
     * Request constructor
     *
     * @param Curl $curl
     * @param Config $config
     */
    public function __construct(
        Curl $curl,
        Config $config
    ) {
        $this->curl = $curl;
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function init($params = []): RequestInterface
    {
        $this->apiKey = $this->config->getApiKey();
        $this->baseUrl = $this->config->getBaseUel();
        $additional = '';
        if ($params) {
            $keyValue = [];
            foreach ($params as $key => $param) {
                $keyValue[] = "$key=$param";
            }

            $additional = implode('&', $keyValue);
        }
        
        $this->requestString = "?" . RequestInterface::REQUEST_APIKEY . "=" . $this->apiKey 
            . (!empty($additional) ? "&" . $additional : "");

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestString(): string
    {
       return $this->requestString;
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse($response = []): RequestInterface
    {
        $this->response = $response;
    }

}