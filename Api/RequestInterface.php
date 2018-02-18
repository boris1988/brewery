<?php

namespace Borisperevyazko\Brewery\Api;

/**
 * Interface RequestInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface RequestInterface
{

    const REQUEST_APIKEY = "key";

    /**
     * Init variables for request
     *
     * @param array $params
     * @return RequestInterface
     */
    public function init($params = []) : RequestInterface;

    /**
     * @return string
     */
    public function getRequestString() : string;

    /**
     * @return string
     */
    public function getBaseUrl() : string;

    /**
     * @return array
     */
    public function getResponse() : array;
    /**
     * @return RequestInterface
     */
    public function setResponse($response = []) : RequestInterface;
}