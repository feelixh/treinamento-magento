<?php

namespace Treinamento\OrderDetails\Console\Command;

use Magento\Framework\App\State;
use Magento\Framework\App\Area;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Magento\Sales\Api\OrderRepositoryInterface;

class OrderDetails extends Command
{
    const NAME_ARGUMENT = 'order';
    const NAME_OPTION = 'details';

    protected $state;
    protected $orderRepository;

    public function __construct(
        State $state,
        OrderRepositoryInterface $orderRepository,
        string $name = null
    ) {
        $this->state = $state;
        $this->orderRepository = $orderRepository;
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('treinamento:order:details');
        $this->setDescription('Retun details of a order');
        $this->setDefinition(
            [
                new InputArgument(self::NAME_ARGUMENT, InputArgument::OPTIONAL, 'order'),
                new InputOption(self::NAME_OPTION, '-o', InputOption::VALUE_NONE, "Exibe mais detalhes")
            ]
        );
        parent::configure();
    }

    /**
     * CLI command description
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->state->setAreaCode(Area::AREA_ADMINHTML); // AREA_GLOBAL
        $option = $input->getOption(self::NAME_OPTION);

        $order_id = $input->getArgument(self::NAME_ARGUMENT) ?: 1;
        /** OrderInterface $order */
        $order = $this->orderRepository->get($order_id);
        $items = $order->getItems();
        $firstItem = reset($items);

        if(!$option){
            $output->writeln("Nome do item: " . $firstItem->getName());
        } else {
            $output->writeln(
                "Nome do item: " . $firstItem->getName() .
                "\nDescrição: " . $firstItem->getDescription() .
                "\nSKU: " . $firstItem->getSku() .
                "\nPreço: " . $firstItem->getPrice() .
                "\nCriado em: " . $firstItem->getCreatedAt() .
                "\nÚltima atualização: " . $firstItem->getUpdatedAt()
            );
        }



    }
}
