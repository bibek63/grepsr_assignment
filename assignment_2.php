<?php 
// Create a function in PHP to floor decimal numbers with any provided precision.
// Example: convert(2.99999,2), convert(199.99999,4)



function convert($value, $precision){
    $multiply = 10 ** $precision;
    $result = floor($value * $multiply) / $multiply;  
    echo $result . "\n";
    
}

convert(2.99999, 2);
convert(199.999999, 4);
?>