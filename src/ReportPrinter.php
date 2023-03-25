<?php

namespace MonacoGP;


class ReportPrinter
{
    function reportPrint(array $reportArray): void
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

}