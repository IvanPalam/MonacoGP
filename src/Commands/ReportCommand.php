<?php

namespace MonacoGP\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use MonacoGP\Parser;
use MonacoGP\TimeCounter;
use MonacoGP\ReportBuilder;
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
                'sort_order',
                's',
                InputOption::VALUE_REQUIRED,
                'shows list of drivers and optional order (default order is ASC)',
                'ASC')
            ->addOption(
                'driver',
                null,
                InputOption::VALUE_REQUIRED,
                'individual driver results');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '<info>======              Racing Report Console App                  =====</>',
            '<info>====================================================================</>',
            '',
        ]);
        $folderPath = $input->getOption('files');
        $abbrevLogPath = "$folderPath/abbreviations.txt";
        $endLogPath = "$folderPath/end.log";
        $startLogPath = "$folderPath/start.log";
        $parser = new Parser();
        $timeCounter = new TimeCounter();
        $reportBuilder = new ReportBuilder();
        $reportPrinter = new ReportPrinter;
        $abbrevKeyAbbreviationArray = $parser->addAbbrevToArrayKey($abbrevLogPath);
        $abbrevKeyEndArray = $parser->addAbbrevToArrayKey($endLogPath);
        $abbrevKeyStartArray = $parser->addAbbrevToArrayKey($startLogPath);
        $racerNameArray = $parser->getRacerName($abbrevKeyAbbreviationArray);
        $teamNameArray = $parser->getTeamName($abbrevKeyAbbreviationArray);
        $startTimeArray = $parser->getTime($abbrevKeyStartArray);
        $endTimeArray = $parser->getTime($abbrevKeyEndArray);
        $lapTimeArray = $timeCounter->lapTimeCounter($startTimeArray, $endTimeArray);
        if ($driver = $input->getOption('driver')) {
            $reportPrinter->printRacerInfo($driver, $racerNameArray, $teamNameArray, $lapTimeArray, $output);

            return Command::SUCCESS;
        }
        $sortOrder = $input->getOption('sort_order');
        $reportPrinter->printCliHtmlReport($racerNameArray, $teamNameArray, $lapTimeArray, $output, $sortOrder);

        return Command::SUCCESS;
    }
}

