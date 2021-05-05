<?php
declare(strict_types=1);

namespace Treinamento\ObserverExample\Observer\Login;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Data\Customer;

class CaptureName implements ObserverInterface
{
    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        /**
         * @var Customer $data
         */
        $data = $observer->getEvent()->getData('customer');
        $completeName = $data->getFirstname() . ' ' . $data->getLastname();
        print_r($completeName);
    }
}
