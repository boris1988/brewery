<?php

namespace Borisperevyazko\Brewery\Api;

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Interface ProductMapperInterface
 *
 * @package Borisperevyazko\Brewery\Api
 */
interface ProductMapperInterface
{
    /**
     * @param ProductInterface $product
     * @param array $data
     * @return ProductInterface
     */
    public function mappingFields(ProductInterface $product, $data = []): ProductMapperInterface;

    /**
     * @param ProductInterface $product
     * @return ProductInterface
     */
    public function setDefaultFields(ProductInterface $product) : ProductMapperInterface;
}