<?php

namespace Borisperevyazko\Brewery\Api;

/**
 * Interface ConfigInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface ConfigInterface
{
    /**
     * @return string
     */
    public function getBaseUel() : string;

    /**
     * @return string
     */
    public function getApiKey() : string ;
}