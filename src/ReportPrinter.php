<?php

namespace MonacoGP;

use Symfony\Component\Console\Output\OutputInterface;

class ReportPrinter
{
    public function reportPrint(array $reportArray): void
    {
        $countArray = [];
        echo '<ol>';
        foreach ($reportArray as $value) {
            $countArray[] = $value;
            echo '<li>' . "$value\n" . '</li>';
            if ((count($countArray) == 15)) {
                echo '<hr>';
            }
        }
        echo '</ol>';
    }

    public function printCliHtmlReport(
        array $racerNameArray,
        array $teamNameArray,
        array $lapTimeArray,
        OutputInterface $output,
        string $sortOrder
    ): void
    {
        if ($sortOrder == "DESC" || !$sortOrder || $sortOrder == "ASC") {
            if ($sortOrder == "DESC") {
                arsort($lapTimeArray);
            } else {
                asort($lapTimeArray);
            }
            $i = 1;
            foreach ($lapTimeArray as $keyLapTime => $lapTimeString) {
                $output->writeln
                ($i . ' ' . $racerNameArray[$keyLapTime] . " | " .
                    $teamNameArray[$keyLapTime] . " | " . $lapTimeString);
                if ($i == 15) {
                    $output->writeln('--------------------------------------------------------------------');
                }
                $i++;
            }
        } else {
            $output->writeln("Enter the correct command from the available ones: 'ASC' or 'DESC'");
        }
    }

    public function printRacerInfo(
        string $racer,
        array $racerNameArray,
        array $teamNameArray,
        array $lapTimeArray,
        OutputInterface $output
    ): void
    {
        foreach ($racerNameArray as $key => $racerNameString) {
            if ($racer == $racerNameString) {
                $output->writeln($racerNameString . " " . $teamNameArray[$key] . " " . $lapTimeArray[$key]);
            }
        }
    }
}

