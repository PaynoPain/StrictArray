<?php

$normal_array = array(
    "a" => "A value",
    "c" => "C value"
);

echo "NORMAL ARRAY:\n";
echo "====================================\n";
echo "The value of a is: " . $normal_array["a"] . "\n";
echo "The value of b is: " . $normal_array["b"] . "\n";
echo "The value of c is: " . $normal_array["c"] . "\n";
echo "\n";

include_once("StrictArray.php");
$strict_array = new StrictArray($normal_array);

try {
    echo "STRICT ARRAY:\n";
    echo "====================================\n";
    echo "The value of a is: " . $strict_array["a"] . "\n";
    echo "The value of b is: " . $strict_array["b"] . "\n";
    echo "The value of c is: " . $strict_array["c"] . "\n";
} catch (UndefinedKeyInStrictArrayException $e){
    echo "The key " . $e->getUndefinedKey() . " is undefined!";
}
echo "\n";