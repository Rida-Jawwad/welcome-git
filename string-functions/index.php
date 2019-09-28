<?php

$array = ["Apple", "ognaM", "Banana", "elppA"];
$string = "";
foreach($array as $key => $value){
    if($key % 2 == 0){
        $string .= $value." ";
    }
    if($key % 2 != 0){
        $reverse = strrev($value);
        $string .= $reverse." ";
    }
}
echo substr($string,0,-7);