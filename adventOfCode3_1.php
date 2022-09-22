<?php
$FILENAME = "C:\Users\Axion\OneDrive\Desktop\AdventOfCode\\report.txt";
$report = fopen($FILENAME, "r") or die("Unable to open file!");
$reportArray = [];

while (($line = fgets($report)) !== false) {
    $data = preg_replace("/\r|\n/", "", $line);
    $trim = trim($data);
    array_push($reportArray, $trim);
}

fclose($report);

$lineLength = strlen($reportArray[0]);

$commonBinary = "";
$rareBinary = "";

for ($i=0; $i<$lineLength; $i++) {
    $one = 0;
    $zero = 0;
    foreach ($reportArray as $number) {
        $digit = (int)($number[$i]);
        if ($digit == 0) {
          $zero++;
        } else {
          $one++;
        }
    }

    if ($zero > $one) {
        $commonBinary .= "0";
        $rareBinary .= "1";
    } else {
        $commonBinary .= "1";
        $rareBinary .= "0";
    }
}

$powerConsumption = bindec($commonBinary) * bindec($rareBinary);
echo "The power consumption is: ".$powerConsumption;
?>