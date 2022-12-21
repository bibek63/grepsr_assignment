<?php
// Write a code or function to display dates in provided format?
// Example:
// Input: 'Sep 20 2021' and '09092021'
// Output: 2021-09-20 and 'Sep-09-2021
// function formatDate($date,$format){
//     $timeStamp = strtotime($date);
//     $formattedDate = date($format, $timeStamp);
//     return $formattedDate;
// }

function createUsingFormat($date,$inputFormat,$outputFormat){
    $timeStamp = DateTime::createFromFormat($inputFormat, $date);
    $formattedTime = $timeStamp->format($outputFormat);
    return $formattedTime;
}

echo createUsingFormat("09092021", "mdY", "M-d-Y");
echo "\n";
echo createUsingFormat("Sep 20 2021", "M d Y", "Y-m-d");


?>