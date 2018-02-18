<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\ProductMapperInterface;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product\Visibility as ProductVisibility;
use Magento\Catalog\Model\Product\Type as ProductType;
use Magento\Store\Model\WebsiteRepository;

/**
 * Class ProductMapper
 *
 * @package Borisperevyazko\Brewery\Model
 */
class ProductMapper implements ProductMapperInterface
{

    const PRODUCT_PRICE = 5;

    protected $mapperRelation = [
        'name' => 'name',
        'description' => 'description',
        'sku' => 'sku'
    ];

    /**
     * @var WebsiteRepository
     */
    protected $websiteRepository;

    /**
     * ProductMapper constructor
     *
     * @param WebsiteRepository $websiteRepository
     */
    public function __construct(WebsiteRepository $websiteRepository)
    {
        $this->websiteRepository = $websiteRepository;
    }

    public function mappingFields(ProductInterface $product, $data = []): ProductMapperInterface
    {
        $update = [];
        foreach ($this->mapperRelation as $magentoField => $breweryField) {
            if (isset($data[$breweryField])) {
                $update[$magentoField] = $data[$breweryField];
            }
        }

        $product->addData($update);

        return $this;
    }

    public function setDefaultFields(ProductInterface $product): ProductMapperInterface
    {
        $product->addData(
            [
                'website_id' => $this->websiteRepository->getDefault()->getId(),
                'visibility' => ProductVisibility::VISIBILITY_BOTH,
                'attribute_set_id' => $product->getDefaultAttributeSetId(),
                'type_id' => ProductType::TYPE_SIMPLE,
                'stock_data' => [
                    'qty' => 1,
                    'is_in_stock' => true
                ],
                "price" => static::PRODUCT_PRICE
            ]
        );

        return $this;
    }
}