<?php

namespace Borisperevyazko\Brewery\Api;

/**
 * Interface ImportProductManagerInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface ImportProductManagerInterface
{
    /**
     * @param ResponseInterface $response
     * @return ImportProductManagerInterface
     */
    public function import(ResponseInterface $response) : ImportProductManagerInterface;
}