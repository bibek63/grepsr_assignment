

<?php
// Write a code, using listed PHP functions, with example
// a. is_int()
// b. is_numeric()
// c. is_integer()

function isInt ($value){
    
    $result = is_int($value);
    if($result){
        echo $value . ' ' ."is an integer\n";
        return;
    }
    else{
        echo $value . ' '. "is not an integer \n";
        return;
    }
   
    
}
function isNumeric($value){
    $result = is_numeric($value);  
    
    if($result){
        echo $value . ' ' . "is numeric\n";
        return;
    }
    else{
        echo $value .' '. "is not numeric\n";

        return;
    }
   
}

function isInteger ($value){
    $result = is_integer($value);
    if($result){
        echo $value ." is an integer\n";
        return;
    }
    else{
        echo $value .' '. "is not an integer\n";
        return;
    }
}

isInt(5);
isInt("Hello");
isNumeric("1");
isNumeric("One");
isInteger(1);
isInteger(2.4);
?>
