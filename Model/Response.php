<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\ResponseInterface;

class Response implements ResponseInterface
{

    protected $response = [];

    public function getResponse(): array
    {
        return $this->response;
    }

    public function setResponse($response = []): ResponseInterface
    {
       $this->response = $response;
       return $this;
    }

    public function getItems(): array
    {
        if (isset($this->response['items'])) {
            return $this->response['items'];
        }

        return [];
    }
}