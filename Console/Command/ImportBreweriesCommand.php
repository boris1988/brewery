<?php

namespace Borisperevyazko\Brewery\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ImportBreweriesCommand
 *
 * @package Borisperevyazko\Brewery\Console\Command
 * @author  Boris Perevyazko <borisperevyazko@gmail.com>
 */
class ImportBreweriesCommand extends Command
{
    const COMMAND_NAME = "brewery:import:products";
    const COMMAND_DESCRIPTION = "Import brewery items from brewerydb.com";

    protected function configure()
    {
        $this->setName(static::COMMAND_NAME);
        $this->setDescription(static::COMMAND_DESCRIPTION);

        parent::configure();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello World");
    }
}