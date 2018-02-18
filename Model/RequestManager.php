<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\RequestManagerInterface;
use Borisperevyazko\Brewery\Api\RequestInterface;

use Borisperevyazko\Brewery\Api\ResponseInterface;
use Magento\Framework\HTTP\Client\Curl;

class RequestManager implements RequestManagerInterface
{

    /**
     * @var Curl
     */
    protected $curl;

    /**
     * @var RequestInterface
     */
    protected $request;

    protected $response;
    /**
     * RequestManager constructor
     *
     * @param Curl $curl
     * @param RequestInterface $request
     */
    public function __construct(
        Curl $curl,
        RequestInterface $request,
        ResponseInterface $response
    ) {
        $this->curl = $curl;
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function send(string $url, $params = []) : RequestManagerInterface
    {
        $this->request->init($params);
        $this->curl->get($this->request->getBaseUrl() . $url . $this->request->getRequestString());
        $this->response->setResponse(json_decode($this->curl->getBody(), true));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(): array
    {
        return $this->response->getResponse();
    }
}