<?php

namespace Borisperevyazko\Brewery\Api;

/**
 * Interface ResponseInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface ResponseInterface
{

    /**
     * @return array
     */
    public function getResponse() : array;

    /**
     * @return RequestInterface
     */
    public function setResponse($response = []) : ResponseInterface;

    /**
     * @return array
     */
    public function getItems() : array;
}