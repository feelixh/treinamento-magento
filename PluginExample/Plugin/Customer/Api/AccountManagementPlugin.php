<?php
declare(strict_types=1);

namespace Treinamento\PluginExample\Plugin\Customer\Api;


use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\Data\CustomerInterface;

class AccountManagementPlugin
{
    /**
     * @param AccountManagementInterface $subject
     * @param CustomerInterface $customer
     * @return CustomerInterface
     */
    public function afterCreateAccount(AccountManagementInterface $subject, CustomerInterface $customer)
    {
        $customer->setFirstname('FEELIXH ON GITHUB');
        return $customer;
    }
}
