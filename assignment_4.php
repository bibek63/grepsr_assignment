<?php
// Write a code using Regex, to solve problem listed:
// a. Provided String: “abc@grepsr.com”
// b. Create an array with two values. Example: [‘abc’,’grepsr.com’]
// c. Ref: https://regex101.com/ (Try/Test)



$string = "abc@grepsr.com";


preg_match('/^([^@]+)@([^@]+)$/', $string, $matches);

$name = $matches[1];
$url = $matches[2];

$result = [$name, $url];
print_r($result); 


?>