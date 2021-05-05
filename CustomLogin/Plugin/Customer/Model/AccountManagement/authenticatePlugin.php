<?php
declare(strict_types=1);

namespace Treinamento\CustomLogin\Plugin\Customer\Model\AccountManagement;

use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Psr\Log\LoggerInterface;

class authenticatePlugin
{
    protected CollectionFactory $collectionFactory;
    private LoggerInterface $logger;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        LoggerInterface $logger
    ){
        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
    }

    /**
     * @param AccountManagementInterface $subject
     * @param $email
     * @param $password
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function beforeAuthenticate(AccountManagementInterface $subject, $login, $password): array
    {
        $login = (filter_var($login, FILTER_VALIDATE_EMAIL)) ?: $this->getEmailByTaxvat($login);

        return [$login, $password];
    }

    private function getEmailByTaxvat($taxvat)
    {
        $collection = $this->collectionFactory->create();
        $collection->addAttributeToFilter('taxvat', array('eq' => $taxvat));
        /** @var CustomerInterface $item */
        $item = $collection->getFirstItem();

        return $item->getEmail();
    }
}
