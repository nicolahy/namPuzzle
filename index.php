<?php

if (PHP_SAPI === "cli") {
    set_time_limit(0);
    $timeStart = microtime(true);

    $expectedResult = 66;
    $counterOK = $counterAll = 0;

    $colorGreenPrexixTerminal = "\033[32m";
    $colorGreenSuffixTerminal = "\033[0m";

    for ($a = 1; $a <= 9; ++$a) {
        for ($b = 1; $b <= 9; ++$b) {
            for ($c = 1; $c <= 9; ++$c) {
                for ($d = 1; $d <= 9; ++$d) {
                    for ($e = 1; $e <= 9; ++$e) {
                        for ($f = 1; $f <= 9; ++$f) {
                            for ($g = 1; $g <= 9; ++$g) {
                                for ($h = 1; $h <= 9; ++$h) {
                                    for ($i = 1; $i <= 9; ++$i) {
                                        ++$counterAll;
                                        $result = $a + 13 * $b / $c + $d + 12 * $e - $f - 11 + $g * $h / $i - 10;
                                        if ($result === $expectedResult
                                            && !in_array($a, [$b, $c, $d, $e, $f, $g, $h, $i], true)
                                            && !in_array($b, [$a, $c, $d, $e, $f, $g, $h, $i], true)
                                            && !in_array($c, [$a, $b, $d, $e, $f, $g, $h, $i], true)
                                            && !in_array($d, [$a, $b, $c, $e, $f, $g, $h, $i], true)
                                            && !in_array($e, [$a, $b, $c, $d, $f, $g, $h, $i], true)
                                            && !in_array($f, [$a, $b, $c, $d, $e, $g, $h, $i], true)
                                            && !in_array($g, [$a, $b, $c, $d, $e, $f, $h, $i], true)
                                            && !in_array($h, [$a, $b, $c, $d, $e, $f, $g, $i], true)
                                            && !in_array($i, [$a, $b, $c, $d, $e, $f, $g, $h], true)) {
                                            echo sprintf(
                                                "[#%d] => %d + 13 * %d / %d + %d + 12 * %d - %d - 11 + %d * %d / %d - 10 = %d\n",
                                                ++$counterOK, $a, $b, $c, $d, $e, $f, $g, $h, $i, $expectedResult);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    $timeEnd = microtime(true);
    $timeScript = round($timeEnd - $timeStart, 2);
    $counterAllFormatted = number_format((float) $counterAll, 0, ".", " ");
    echo "{$colorGreenPrexixTerminal}{$counterOK} positive results on {$counterAllFormatted} calculations performed in {$timeScript} seconds{$colorGreenSuffixTerminal}\n";
}
