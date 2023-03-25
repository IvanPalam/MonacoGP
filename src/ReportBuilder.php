<?php

namespace MonacoGP;

class ReportBuilder
{
    public function reportBuild(array $lapTimeArray, array $fullNameAndTeamArray): array
    {
        $reportArray = [];
        foreach ($lapTimeArray as $keyAbbTime => $timeLapString) {
            foreach ($fullNameAndTeamArray as $keyAbbName => $nameAndTeamString) {
                if ($keyAbbTime == $keyAbbName) {
                    $reportArray[$keyAbbTime] = $nameAndTeamString . " " . '|' . " " . $timeLapString;

                }
            }
        }

        return $reportArray;

    }

}