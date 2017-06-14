<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Inchoo\Console\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * An Abstract class for Indexer related commands.
 */
class HelloWorldCommand extends Command
{

    public function __construct(
        \Magento\Config\Model\ResourceModel\Config $resourceConfig
    ) {
	parent::__construct();
        $this->_resourceConfig = $resourceConfig;
    }

    protected function configure()
    {
        $this->setName('inchoo:hello_world')->setDescription('Prints hello world.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	$this->_resourceConfig->saveConfig(
                    'dev/debug/template_hints_storefront',
                    1,
                    'default',
                    0
                );
        $output->writeln('Template hints enabled!');
    }

}
