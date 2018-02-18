<?php

namespace Borisperevyazko\Brewery\Api;

interface ConfigInterface
{

    public function getBaseUel() : string;

    public function getApiKey() : string ;
}