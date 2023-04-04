<?php

namespace MonacoGP\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use MonacoGP\ReportPrinter;


class ReportCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:report')
            ->setDescription('Show results report')
            ->addOption(
                'files',
                null,
                InputOption::VALUE_REQUIRED,
                'Folder with input files')
            ->addOption(
                'sort',
                's',
                InputOption::VALUE_REQUIRED,
                'shows list of drivers and optional order (default order is asc)',
                'asc')
            ->addOption(
                'driver',
                null,
                InputOption::VALUE_REQUIRED,
                'individual driver results');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}