<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Config
 *
 * @package Borisperevyazko\Brewery\Model
 */
class Config implements ConfigInterface
{

    const XML_CONFIG_API_KEY = "borisperevyazko/brewery/api_key";
    const XML_CONFIG_BASE_URL = "borisperevyazko/brewery/base_url";

    protected $scopeConfig;

    /**
     * Config constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->scopeConfig->getValue(static::XML_CONFIG_API_KEY);
    }

    /**
     * @return string
     */
    public function getBaseUel(): string
    {
        return $this->scopeConfig->getValue(static::XML_CONFIG_BASE_URL);
    }
}