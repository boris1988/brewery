<?php

namespace Borisperevyazko\Brewery\Api;

/**
 * Interface RequestManagerInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface RequestManagerInterface
{

    /**
     * @param string $url
     * @param array $params
     * @return mixed
     */
    public function send(string $url, $params = []) : RequestManagerInterface;

    /**
     * @return array
     */
    public function getResponse() : array;

}