<?php

require_once "vendor/autoload.php";

use MonacoGP\Parser;
use MonacoGP\TimeCounter;
use MonacoGP\ReportBuilder;
use MonacoGP\ReportPrinter;

$abbrevLogPath = realpath('logfiles/abbreviations.txt');
$endLogPath = realpath('logfiles/end.log');
$startLogPath = realpath('logfiles/start.log');
$parser = new Parser();
$timeCounter = new TimeCounter();
$reportBuilder = new ReportBuilder();
$reportPrinter= new ReportPrinter;
$abbrevKeyAbbreviationArray=$parser->addAbbrevToArrayKey($abbrevLogPath);
$abbrevKeyEndArray=$parser->addAbbrevToArrayKey($endLogPath);
$abbrevKeyStartArray=$parser->addAbbrevToArrayKey($startLogPath);
$racerNameArray=$parser->getRacerName($abbrevKeyAbbreviationArray);
$teamNameArray=$parser->getTeamName($abbrevKeyAbbreviationArray);
$startTimeArray=$parser->getTime($abbrevKeyStartArray);
$endTimeArray=$parser->getTime($abbrevKeyEndArray);
$lapTimeArray=$timeCounter->lapTimeCounter($startTimeArray,$endTimeArray);
$reportBuild=$reportBuilder->reportBuild($racerNameArray,$teamNameArray,$lapTimeArray);
$reportPrinter->reportPrint($reportBuild);

