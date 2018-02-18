<?php

namespace Borisperevyazko\Brewery\Model;

use Borisperevyazko\Brewery\Api\ImportProductManagerInterface;
use Borisperevyazko\Brewery\Api\ProductMapperInterface;
use Borisperevyazko\Brewery\Api\RequestInterface;
use Borisperevyazko\Brewery\Api\ResponseInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\DataObject;

/**
 * Class ImportProductManager
 *
 * @package Borisperevyazko\Brewery\Model
 */
class ImportProductManager extends DataObject implements ImportProductManagerInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ProductMapperInterface
     */
    protected $mapper;

    /**
     * @var ProductInterfaceFactory
     */
    protected $productFactory;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    public function __construct(
        RequestInterface $request,
        ProductMapperInterface $productMapper,
        ProductInterfaceFactory $productFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->request = $request;
        $this->mapper = $productMapper;
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        parent::__construct();
    }

    public function import(ResponseInterface $response): ImportProductManagerInterface
    {
        foreach ($response->getItems() as $item) {
            $product = $this->productFactory->create();
            $this->mapper->setDefaultFields($product)
                ->mappingFields($product, $item);
            $this->productRepository->save($product);
        }

        return $this;
    }
}