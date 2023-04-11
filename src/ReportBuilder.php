<?php

namespace MonacoGP;

class ReportBuilder
{
    public function reportBuild(array $racerNameArray, array $teamNameArray, array $lapTimeArray): array
    {
        $reportArray = [];
        asort($lapTimeArray);
        foreach ($lapTimeArray as $keyLapTime => $lapTimeString) {
            $reportArray[$keyLapTime] = $racerNameArray[$keyLapTime] ." | ". $teamNameArray[$keyLapTime] ." | ". $lapTimeString;


        }

        return $reportArray;

    }
}
