<?php

namespace Borisperevyazko\Brewery\Api;

interface RequestInterface
{

    public function setAction(string $action) : RequestInterface;


    public function send(string $url, $params = []);

}