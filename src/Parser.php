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

    public function getRacerName(array $array): array
    {

        $allRacerNames = [];
        foreach ($array as $key => $string) {
            if (preg_match('/_(.+)_/', $string, $newArray))
                foreach ($newArray as $racerName)
                    $allRacerNames[$key] = $racerName;
        }

        return $allRacerNames;
    }

    public function getTeamName(array $array): array
    {

        $allRacerNames = [];
        foreach ($array as $key => $string) {
            if (preg_match('/_([A-Z]{3}.+)/', $string, $newArray))
                foreach ($newArray as $racerName)
                    $allRacerNames[$key] = $racerName;
        }

        return $allRacerNames;
    }
}