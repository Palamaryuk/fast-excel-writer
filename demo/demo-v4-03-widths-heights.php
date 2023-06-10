<?php
include_once __DIR__ . '/../src/autoload.php';

$outFileName = __DIR__ . '/output/' . basename(__FILE__, '.php') . '.xlsx';

use \avadim\FastExcelWriter\Excel;

$timer = microtime(true);
$excel = Excel::create();
$sheet = $excel->getSheet();

//$sheet->setColWidths([10, 20, 30, 40]);
$sheet->setColWidths(['B' => 10, 'C' => 20, 'E' => 30, 'F' => 40]);
$sheet->setRowHeight(2, 33);
//$sheet->setRowHeights([1 => 20, 2 => 33, 3 => 40]);

// Write row width default height
$sheet->writeRow([300, 234, 456, 789]);

// Write row with specified height
$sheet->writeRow([300, 234, 456, 789], ['height' => 20]);

// Write row with specified height - other way (preferred)
$sheet->writeRow([300, 234, 456, 789])->applyRowHeight(40);

$excel->save($outFileName);

echo '<b>', basename(__FILE__, '.php'), "</b><br>\n<br>\n";
echo 'out filename: ', $outFileName, "<br>\n";
echo 'elapsed time: ', round(microtime(true) - $timer, 3), ' sec', "<br>\n";
echo 'memory peak usage: ', memory_get_peak_usage(true), "<br>\n";

// EOF