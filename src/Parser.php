<?php

namespace MonacoGP;

class Parser
{

    public function addAbbrevForArrayKey(string $logFilePath): array
    {
        $logArray = file($logFilePath);
        $allAbbrevNamesRacer = [];
        foreach ($logArray as $fullStringNameRacer)
            if (preg_match('/^[A-Z]{3}/', $fullStringNameRacer, $newArray)) {
                foreach ($newArray as $abbrev)
                    $allAbbrevNamesRacer[$fullStringNameRacer] = $abbrev;
            }

        return array_flip($allAbbrevNamesRacer);
    }

    public function getTime(array $array): array
    {

        $allRacerTimes = [];
        foreach ($array as $key => $string) {
            if (preg_match('/_.*/', $string, $newArray))
                foreach ($newArray as $stringTime)
                    $allRacerTimes[$key] = str_replace('_', '', $stringTime);
        }

        return $allRacerTimes;
    }

    function
    getFullNameAndTeam(array $array): array
    {

        $allAbbrevNamesRacer = [];
        foreach ($array as $key => $abbrevString) {
            $nameTeamString = preg_replace('/[A-Z]{3}_/', '', $abbrevString);
            $nameTeamString = str_replace('_', ' | ', $nameTeamString);
            $nameTeamString = rtrim($nameTeamString, "\n");
            $allAbbrevNamesRacer[$key] = $nameTeamString;
        }
        return $allAbbrevNamesRacer;
    }


}