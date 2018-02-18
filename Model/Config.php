<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config implements ConfigInterface
{

    const XML_CONFIG_API_KEY = "borisperevyazko/brewery/api_key";
    const XML_CONFIG_BASE_URL = "borisperevyazko/brewery/base_url";

    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getApiKey(): string
    {
        return $this->scopeConfig->getValue(static::XML_CONFIG_API_KEY);
    }

    public function getBaseUel(): string
    {
        return $this->scopeConfig->getValue(static::XML_CONFIG_BASE_URL);
    }
}