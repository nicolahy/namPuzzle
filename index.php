<?php 
set_time_limit(0);

// Calculation of page load time
function chrono(){
    $time = explode(" ", microtime());
    return $time[0]+$time[1];
}

$result = $counterOK = $counterAll = 0;
$toDisplay = "";

$startPage = chrono();

for($a = 1;$a <= 9; ++$a) {
	for($b = 1;$b <= 9; ++$b) {
		for($c = 1; $c <= 9; ++$c) {
			for($d = 1;$d <= 9;++$d) {
				for($e = 1; $e <= 9; ++$e) {
					for($f = 1; $f <= 9; ++$f) {
						for($g = 1;$g <= 9;++$g) {
							for($h = 1;$h <= 9;++$h) {
								for($i = 1;$i <= 9;++$i) {
                                    ++$counterAll;
									$result = $a + 13 * $b / $c + $d + 12 * $e - $f - 11 + $g * $h / $i - 10;
									if($result == 66 
                                        && !in_array($a, [$b,$c,$d,$e,$f,$g,$h,$i], true)
                                        && !in_array($b, [$a,$c,$d,$e,$f,$g,$h,$i], true)
                                        && !in_array($c, [$b,$a,$d,$e,$f,$g,$h,$i], true)
                                        && !in_array($d, [$b,$c,$a,$e,$f,$g,$h,$i], true)
                                        && !in_array($e, [$b,$c,$d,$a,$f,$g,$h,$i], true)
                                        && !in_array($f, [$b,$c,$d,$e,$a,$g,$h,$i], true)
                                        && !in_array($g, [$b,$c,$d,$e,$f,$a,$h,$i], true)
                                        && !in_array($h, [$b,$c,$d,$e,$f,$g,$a,$i], true)
                                        && !in_array($i, [$b,$c,$d,$e,$f,$g,$h,$a], true)) {
										++$counterOK;
										$toDisplay .= "<li>{$counterOK} | <b>{$a}</b> + 13 * <b>{$b}</b> / <b>{$c}</b> + <b>{$d}</b> + 12 * <b>{$e}</b> - <b>{$f}</b> - 11 + <b>{$g}</b> * <b>{$h}</b> / <b>{$i}</b> - 10 = {$result}</li>";
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
?>
<ul>
    <?php echo $toDisplay; ?>
</ul>
<?php
$endPage = round(chrono()-$startPage, 2);
echo "=> {$counterOK} résultats positifs sur {$counterAll} calculs réalisés en {$endPage} secondes";
