<?php

namespace MonacoGP;

use DateTimeImmutable;

class TimeCounter
{

    public function lapTimeCounter(array $startTimeArray, array $endTimeArray): array
    {
        $allLapTimeArray = [];
        foreach ($startTimeArray as $keyStart => $startTimeString) {
            $startTimeDate = new DateTimeImmutable($startTimeString);
            foreach ($endTimeArray as $keyEnd => $endTimeString) {
                if ($keyStart == $keyEnd)
                    $endTimeDate = new DateTimeImmutable($endTimeString);
            }

            $lapTime = $startTimeDate->diff($endTimeDate);
            $allLapTimeArray[$keyStart] = substr($lapTime->format('%H:%I:%S.%F'), 0, -3);

        }

        return $allLapTimeArray;
    }
}