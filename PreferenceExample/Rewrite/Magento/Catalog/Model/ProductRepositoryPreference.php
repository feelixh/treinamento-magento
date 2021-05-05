<?php
declare(strict_types=1);

namespace Treinamento\PreferenceExample\Rewrite\Magento\Catalog\Model;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Exception\NoSuchEntityException;

class ProductRepositoryPreference extends ProductRepository
{
    public function get($id, $editMode = false, $storeId = null, $forceReload = false)
    {
        $product = $this->productFactory->create();

        if (!$id) {
            throw new NoSuchEntityException(
                __("The product that was requested doesn't exist. Verify the product and try again.")
            );
        }

        $product->load($id);

        return $product;
    }
}
